<?php
require_once 'vendor/autoload.php';

use Core\Sorter\Sorter;

$sorter = new Sorter();
echo $sorter->sortAlphabetically('lemon orange banana apple');