<?php
namespace Core\Exception;

use Throwable;

class FailedSortWordsException extends \Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct("Не удалось отсортировать слова", $code, $previous);
    }
}