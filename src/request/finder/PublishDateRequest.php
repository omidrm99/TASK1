<?php

namespace App\request\finder;

use App\dataBaseReader;
class PublishDateRequest
{
    private array $foundBooks = [];
    private array $sortedBooks = [];
    function findBookBypublishDate(array $books, ...$targetpublishDates)
    {


        foreach ($targetpublishDates as $date) {
            foreach ($books as $book) {
                if ($book['publishDate'] === $date) {
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