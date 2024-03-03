<?php

namespace App\request\finder;
use App\dataBaseReader;
class BookTitleRequest
{
    private array $foundBooks = [];
    private array $sortedBooks = [];
    function findBookBookTitle(array $books, ...$targetBookTitles): void
    {
        foreach ($targetBookTitles as $bookTitle) {
            foreach ($books as $book) {
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