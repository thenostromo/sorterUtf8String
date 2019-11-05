<?php
namespace Core\Exception;

use Throwable;

class EmptyTextException extends \Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct("Укажите строку для сортировки", $code, $previous);
    }
}