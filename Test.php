<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once('Period.php');
require_once('DataProcessor.php');

class Test extends TestCase
{
    /**
     * @throws Exception
     */
    public function testPeriods()
    {
        $periods   = [];
        $periods[] = new Period(new DateTime('01.09.2021'), new DateTime('10.09.2021'), 5);
        $periods[] = new Period(new DateTime('08.09.2021'), new DateTime('15.09.2021'),6, false);
        $periods[] = new Period(new DateTime('14.09.2021'), new DateTime('18.09.2021'), 4);

        $processor       = new DataProcessor();
        $accessibleDates = $processor->getAccessibleDates($periods);
        print_r($accessibleDates);
    }
}