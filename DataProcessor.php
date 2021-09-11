<?php declare(strict_types=1);

require_once('Period.php');

class DataProcessor
{
    /**
     * @param Period[] $dates
     *
     * @throws Exception
     */
    public function getAccessibleDates(array $dates): array
    {
        $result  = [];
        $periods = $this->getArrayPeriods($dates);

        $keys      = array_keys($periods);
        $keysCount = count($keys);

        for ($i = 0; $i < $keysCount - 1; $i++) {
            if (!$periods[$keys[$i]] && !$periods[$keys[$i + 1]]) {
                continue;
            }

            $from = '@' . $keys[$i];

            while ($i < $keysCount - 1 && $periods[$keys[$i + (int)!$periods[$keys[$i]]]]) {
                $i++;
            }

            $to = '@' . $keys[$i];

            $result[] = new Period(new DateTime($from), new DateTime($to));
        }

        return $result;
    }

    /**
     * @param Period[] $dates
     *
     * @return bool[]
     */
    private function getArrayPeriods(array $dates): array
    {
        /** @var Period[] $periods */
        $periods = [];

        foreach ($dates as $interval) {
            $fromTimeStamp = $interval->getFrom()->getTimestamp();
            $toTimeStamp   = $interval->getTo()->getTimestamp();

            if (!isset($periods[$fromTimeStamp]) || $interval->getPriority() > $periods[$fromTimeStamp]->getPriority()) {
                $periods[$fromTimeStamp] = $interval->isAccessible();
            }

            if (!isset($periods[$toTimeStamp]) || $interval->getPriority() > $periods[$toTimeStamp]->getPriority()) {
                $periods[$toTimeStamp] = $interval->isAccessible();
            }
        }

        return $periods;
    }
}