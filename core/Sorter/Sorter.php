<?php

class Sorter
{
    public function sortAlphabetically($rawText)
    {
echo $rawText;
    }
}

/*
 * 'lemon orange banana apple' ---> 'elmno aegnor aaabnn aelpp'
'лимон апельсин банан яблоко' ---> 'илмно аеилнпсь аабнн бклооя'
'αβγαβγ αβγαβγαβγ' ---> 'ααββγγ αααβββγγγ'
 */
$sorter = new Sorter();
echo $sorter->sortAlphabetically('lemon orange banana apple');