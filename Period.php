<?php declare(strict_types=1);

class Period
{
    /**
     * @var DateTime
     */
    private DateTime $from;

    /**
     * @var DateTime
     */
    private DateTime $to;

    /**
     * @var int
     */
    private int $priority;

    /**
     * @var bool
     */
    private bool $accessible;

    /**
     * DataPeriod constructor.
     *
     * @param DateTime $from
     * @param DateTime $to
     * @param int      $priority
     * @param bool     $accessible
     *
     * @throws Exception
     */
    public function __construct(DateTime $from, DateTime $to, int $priority = 0, bool $accessible = true)
    {
        $this->from       = $from;
        $this->to         = $to;
        $this->priority   = $priority;
        $this->accessible = $accessible;
    }

    /**
     * @param DateTime $from
     *
     * @return $this
     */
    public function setFrom(DateTime $from): Period
    {
        $this->from = $from;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getFrom(): DateTime
    {
        return $this->from;
    }

    /**
     * @param DateTime $to
     *
     * @return $this
     */
    public function setTo(DateTime $to): Period
    {
        $this->to = $to;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getTo(): DateTime
    {
        return $this->to;
    }

    /**
     * @param int $priority
     *
     * @return $this
     */
    public function setPriority(int $priority): self
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * @return int
     */
    public function getPriority(): int
    {
        return $this->priority;
    }

    /**
     * @param bool $accessible
     *
     * @return $this
     */
    public function setAccessible(bool $accessible): self
    {
        $this->accessible = $accessible;

        return $this;
    }

    /**
     * @return bool
     */
    public function isAccessible(): bool
    {
        return $this->accessible;
    }
}