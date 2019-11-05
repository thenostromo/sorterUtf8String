<?php
namespace Core\Exception;

use Throwable;

class FailedParseStringException extends \Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct("Не удалось разобрать строку", $code, $previous);
    }
}