<?php
/**
 *  * Dawid Bednarz( dawid@bednarz.pro )
 * Read README.md file for more information and licence uses
 */
declare(strict_types=1);

namespace DawBed\PHPOperationLimit\Exception;

use DawBed\PHPOperationLimit\OperationLimitInterface;
use Throwable;

class ExceedsLimitException extends \Exception
{
    private $operationLimit;

    public function __construct(OperationLimitInterface $operationLimit, $message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->operationLimit = $operationLimit;
    }

    public function getOperationLimit(): OperationLimitInterface
    {
        return $this->operationLimit;
    }
}