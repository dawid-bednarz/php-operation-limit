<?php
/**
 *  * Dawid Bednarz( dawid@bednarz.pro )
 * Read README.md file for more information and licence uses
 */
declare(strict_types=1);

namespace DawBed\PHPOperationLimit;

use DawBed\PHPContext\ContextInterface;

interface OperationLimitInterface
{
    public function getId(): ?int;

    public function setId(int $id): OperationLimitInterface;

    public function getName(): ?string;

    public function setName(string $name): OperationLimitInterface;

    public function getForTime();

    public function setForTime(string $forTime): OperationLimitInterface;

    public function setOnTime(string $onTime): OperationLimitInterface;

    public function addExecuted(): OperationLimitInterface;

    public function getOnTime();

    public function getAllowed(): ?int;

    public function setAllowed(int $count): OperationLimitInterface;

    public function getExecuted(): int;

    public function setExecuted(int $executed): OperationLimitInterface;

    public function getLastExecuted(): \DateTime;

    public function setLastExecuted(\DateTime $lastExecuted): OperationLimitInterface;

    public function getContext(): ?ContextInterface;

    public function setContext(ContextInterface $context): OperationLimitInterface;

    public function getTimeToUnlock(): \DateInterval;

    public function getDateTimeToUnlock(): \DateTime;
}