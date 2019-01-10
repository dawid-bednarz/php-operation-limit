<?php
/**
 *  * Dawid Bednarz( dawid@bednarz.pro )
 * Read README.md file for more information and licence uses
 */
declare(strict_types=1);

namespace DawBed\PHPOperationLimit\Model;

use DawBed\PHPOperationLimit\OperationLimit;

class CreateModel extends AbstractModel
{
    public function make(): OperationLimit
    {
        $this->entity
            ->setLastExecuted(new \DateTime())
            ->addExecuted();
        return $this->entity;
    }
}