<?php
/**
 *  * Dawid Bednarz( dawid@bednarz.pro )
 * Read README.md file for more information and licence uses
 */
declare(strict_types=1);

namespace DawBed\PHPOperationLimit;

use DawBed\PHPContext\ContextInterface;

class OperationLimit implements OperationLimitInterface
{
    protected $id;
    protected $name;
    protected $forTime;
    protected $onTime;
    protected $allowed;
    protected $executed;
    protected $lastExecuted;
    protected $context;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): OperationLimitInterface
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): OperationLimitInterface
    {
        $this->name = $name;

        return $this;
    }

    public function getForTime(): ?string
    {
        return $this->forTime;
    }

    public function setForTime(string $forTime): OperationLimitInterface
    {
        new \DateInterval($forTime);
        $this->forTime = $forTime;
        return $this;
    }

    public function getOnTime(): ?string
    {
        return $this->onTime;
    }

    public function setOnTime(string $onTime): OperationLimitInterface
    {
        new \DateInterval($onTime);
        $this->onTime = $onTime;
        return $this;
    }

    public function getAllowed(): ?int
    {
        return $this->allowed;
    }

    public function setAllowed(int $allowed): OperationLimitInterface
    {
        $this->allowed = $allowed;
        return $this;
    }

    public function addExecuted(): OperationLimitInterface
    {
        $this->executed += 1;
        return $this;
    }

    public function getExecuted(): int
    {
        return $this->executed;
    }

    public function setExecuted(int $executed): OperationLimitInterface
    {
        $this->executed = $executed;
        return $this;
    }

    public function getLastExecuted(): \DateTime
    {
        return $this->lastExecuted;
    }

    public function setLastExecuted(\DateTime $lastExecuted): OperationLimitInterface
    {
        $this->lastExecuted = $lastExecuted;
        return $this;
    }

    public function getContext(): ? ContextInterface
    {
        return $this->context;
    }

    public function setContext(ContextInterface $context): OperationLimitInterface
    {
        $this->context = $context;
        return $this;
    }

    public function getTimeToUnlock(): \DateInterval
    {
        $blockForTime = new \DateInterval($this->forTime);
        $lastExecuted = clone $this->lastExecuted;
        $blockedTime = $lastExecuted->add($blockForTime);

        return $blockedTime->diff(new \DateTime());
    }

    public function getDateTimeToUnlock(): \DateTime
    {
        return (new \DateTime())->add($this->getTimeToUnlock());
    }
}