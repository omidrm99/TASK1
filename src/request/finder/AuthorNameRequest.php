<?php

namespace App\request\finder;
use App\dataBaseReader;
class AuthorNameRequest
{
    private array $foundBooks = [];
    private array $sortedBooks = [];

    function findBookByAuthorName(array $books, ...$targetAuthorNames): void
    {

        foreach ($targetAuthorNames as $authorName) {
            foreach ($books as $book) {
                if ($book['authorName'] === $authorName) {
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