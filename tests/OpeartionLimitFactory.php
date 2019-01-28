<?php
/**
 *  * Dawid Bednarz( dawid@bednarz.pro )
 * Read README.md file for more information and licence uses
 */
declare(strict_types=1);

namespace DawBed\PHPOperationLimit\Tests;

use DawBed\PHPOperationLimit\OperationLimit;

class OpeartionLimitFactory
{
    public function base(): OperationLimit
    {
        $context = new Context();
        $context->setName('test');
        $entity = new OperationLimit();
        $entity->setContext($context);
        $entity->setLastExecuted(new \DateTime());
        $entity->setName('test');
        $entity->setId(1);
        $entity->setExecuted(0);
        $entity->setAllowed(1);
        $entity->setOnTime('PT10M');
        $entity->setForTime('PT30M');

        return $entity;
    }
    public function exceeds(): OperationLimit
    {
        $context = new Context();
        $context->setName('test');
        $entity = new OperationLimit();
        $entity->setContext($context);
        $entity->setLastExecuted(new \DateTime());
        $entity->setName('test');
        $entity->setId(1);
        $entity->setExecuted(1);
        $entity->setAllowed(1);
        $entity->setOnTime('PT10M');
        $entity->setForTime('PT30M');

        return $entity;
    }
}

class Context extends \DawBed\PHPContext\Context
{
}