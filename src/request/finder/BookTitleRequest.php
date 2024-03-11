<?php

namespace App\request\finder;

use App\dataBaseReader;
use App\dataBaseReader\Merger;

class BookTitleRequest implements getBooks
{
    private array $foundBooks = [];
    private array $sortedBooks = [];

    function findBookBookTitle(...$targetBookTitles): void
    {
        $merger = new Merger();
        $mergedData = $merger->getMergedData();
        foreach ($targetBookTitles as $bookTitle) {
            foreach ($mergedData as $book) {
                if ($book['bookTitle'] === $bookTitle) {
                    $this->foundBooks[] = $book;
                }
            }
        }
    }

    private function publishDateSorter(): void
    {
        $sorter = new dataBaseReader\publishDateSorter($this->foundBooks);
        $this->sortedBooks = $sorter->getSortedData();
    }


    public function getSortedBooks(): array
    {
        // Sort books if not already sorted
        if (empty($this->sortedBooks)) {
            $this->publishDateSorter();
        }
        return $this->sortedBooks;
    }
}