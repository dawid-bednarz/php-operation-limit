<?php
/**
 *  * Dawid Bednarz( dawid@bednarz.pro )
 * Read README.md file for more information and licence uses
 */
declare(strict_types=1);

namespace DawBed\PHPOperationLimit\Tests\Model;

use DawBed\PHPOperationLimit\Exception\ExceedsLimitException;
use DawBed\PHPOperationLimit\Model\UpdateModel;
use DawBed\PHPOperationLimit\OperationLimit;
use DawBed\PHPOperationLimit\Tests\OpeartionLimitFactory;
use PHPUnit\Framework\TestCase;

class UpdateModelTest extends TestCase
{
    private $opeartionLimitFactory;

    function setUp()
    {
        $this->opeartionLimitFactory = new OpeartionLimitFactory();
    }

    public function test_make()
    {
        $model = new UpdateModel($this->opeartionLimitFactory->base());

        $this->assertInstanceOf(OperationLimit::class, $model->make());
    }

    public function test_make_is_exceeds()
    {
        $this->expectException(ExceedsLimitException::class);

        $model = new UpdateModel($this->opeartionLimitFactory->exceeds());

        $model->make();
    }
}