<?php

declare(strict_types=1);

namespace App\request\finder;


use App\dataBaseReader;
use App\dataBaseReader\Merger;

class ISBNRequest implements getBooks
{

    private array $foundBooks = [];
    private array $sortedBooks = [];

    public function findBookByISBN(...$targetISBNs): void
    {
        $merger = new Merger();
        $mergedData = $merger->getMergedData();

        foreach ($targetISBNs as $isbn) {
            foreach ($mergedData as $book) {
                if ($book['ISBN'] === $isbn) {
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