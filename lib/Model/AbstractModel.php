<?php
/**
 *  * Dawid Bednarz( dawid@bednarz.pro )
 * Read README.md file for more information and licence uses
 */
declare(strict_types=1);

namespace DawBed\PHPOperationLimit\Model;

use DawBed\PHPOperationLimit\OperationLimit;

abstract class AbstractModel
{
    protected $entity;

    function __construct(OperationLimit $operationLimit)
    {
        $this->entity = $operationLimit;
    }

    public function getEntity(): OperationLimit
    {
        return $this->entity;
    }

    public abstract function make(): OperationLimit;

}