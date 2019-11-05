<?php
namespace Core\Exception;

use Throwable;

class FailedMakeSortedStringException extends \Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct("Не удалось получить отсортированную строку", $code, $previous);
    }
}