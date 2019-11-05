<?php
namespace Core\Sorter;

use Core\Exception\EmptyTextException;
use Core\Exception\FailedParseStringException;
use Core\Exception\FailedSortWordsException;
use Core\Exception\FailedMakeSortedStringException;

class Sorter
{
    /**
     * @param string $rawText
     * @return string
     */
    public function sortAlphabetically(string $rawText): string
    {
        $sortedString = "";
        try {
            $textWords = $this->prepareString($rawText);
            $sortedWords = $this->sortWords($textWords);
            $sortedString = $this->makeSortedString($sortedWords);
        } catch (EmptyTextException|FailedParseStringException|FailedMakeSortedStringException|FailedSortWordsException $ex) {
            return $ex->getMessage();
        }
        return $sortedString;
    }

    /**
     * @param array $words
     * @return array
     * @throws FailedSortWordsException
     */
    private function sortWords(array $words): array
    {
        $sortedWords = [];
        foreach ($words as $word) {
            $wordChars = preg_split('//u', $word, -1, PREG_SPLIT_NO_EMPTY);
            sort($wordChars);
            $sortedWords[] = implode('', $wordChars);
        }

        if (count($sortedWords) === 0) {
            throw new FailedSortWordsException();
        }
        return $sortedWords;
    }

    /**
     * @param array $words
     * @return string
     * @throws FailedMakeSortedStringException
     */
    private function makeSortedString(array $words): string
    {
        $sortedString = "";
        foreach ($words as $word) {
            $sortedString = sprintf("%s %s", $sortedString, $word);
        }
        $sortedString = trim($sortedString);
        if (!$sortedString) {
            throw new FailedMakeSortedStringException();
        }
        return $sortedString;
    }

    /**
     * @param string $rawText
     * @return array
     * @throws EmptyTextException
     * @throws FailedParseStringException
     */
    private function prepareString(string $rawText): array
    {
        $text = trim($rawText);
        if (!$text) {
            throw new EmptyTextException();
        }
        $words = explode(' ', $text);
        if (count($words) === 0) {
            throw new FailedParseStringException();
        }
        return $words;
    }
}
