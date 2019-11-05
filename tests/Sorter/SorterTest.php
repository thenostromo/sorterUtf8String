<?php
namespace Tests\Sorter;

use PHPUnit\Framework\TestCase;
use Core\Sorter\Sorter;

class SorterTest extends TestCase
{
    /**
     * @var Sorter
     */
    private $sorter;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->sorter = new Sorter();
    }

    public function testSortAlphabetically()
    {
        foreach ($this->sortTextProvider() as $raw => $result) {
            $this->assertSame($result, $this->sorter->sortAlphabetically($raw));
        }
    }

    /**
     * @return array
     */
    private function sortTextProvider()
    {
        return [
            'lemon orange banana apple' => 'elmno aegnor aaabnn aelpp',
            'лимон апельсин банан яблоко' => 'илмно аеилнпсь аабнн бклооя',
            'αβγαβγ αβγαβγαβγ' => 'ααββγγ αααβββγγγ',
            '' => 'Укажите строку для сортировки'
        ];
    }
}
