<?php

namespace App\request\finder;
use App\dataBaseReader;
use App\dataBaseReader\Merger;

class AuthorNameRequest implements getBooks
{
    private array $foundBooks = [];
    private array $sortedBooks = [];

    function findBookByAuthorName(...$targetAuthorNames): void
    {
        $merger = new Merger();
        $mergedData = $merger->getMergedData();

        foreach ($targetAuthorNames as $authorName) {
            foreach ($mergedData as $book) {
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
        if (empty($this->sortedBooks)) {
            $this->publishDateSorter();
        }
        return $this->sortedBooks;
    }
}