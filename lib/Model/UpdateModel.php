<?php
/**
 *  * Dawid Bednarz( dawid@bednarz.pro )
 * Read README.md file for more information and licence uses
 */
declare(strict_types=1);

namespace DawBed\PHPOperationLimit\Model;

use DawBed\PHPOperationLimit\Exception\ExceedsLimitException;
use DawBed\PHPOperationLimit\OperationLimit;
use Gedmo\Exception;

class UpdateModel extends AbstractModel
{
    public function make(): OperationLimit
    {
        $this->checkCanOrException();

        return $this->entity;
    }

    private function checkCanOrException(): void
    {
        $operationForTime = new \DateInterval($this->entity->getForTime());
        $lastExecuted = clone $this->entity->getLastExecuted();
        $now = new \DateTime();
        $currentExecuted = $this->entity->getExecuted();
        $limitOperationTime = $lastExecuted->add($operationForTime);
        $currentExecuted++;

        if ($limitOperationTime < $now) {
            $this->reset();
            return;
        }

        if ($currentExecuted > $this->entity->getExecuted()) {
            if ($limitOperationTime > $now) {
                throw new ExceedsLimitException($this->entity);
            }
        }
        $this->entity
            ->setLastExecuted(new \DateTime())
            ->addExecuted();
    }

    private function reset(): void
    {
        $this->entity
            ->setLastExecuted(new \DateTime())
            ->setExecuted(0);
    }
}