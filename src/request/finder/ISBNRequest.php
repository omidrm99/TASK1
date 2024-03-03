<?php

declare(strict_types=1);

namespace App\request\finder;


use App\dataBaseReader;


class ISBNRequest
{

    private array $foundBooks = [];
    private array $sortedBooks = [];

    public function findBookByISBN(array $books, ...$targetISBNs)
    {
        foreach ($targetISBNs as $isbn) {
            foreach ($books as $book) {
                if ($book['ISBN'] === $isbn) {
                    $this->foundBooks[] = $book;
                }
            }
        }
    }


    private function publishDateSorter()
    {
        $sorter = new dataBaseReader\publishDateSorter($this->foundBooks);
        $this->sortedBooks = $sorter->getSortedData();
    }


    public function getSortedBooks()
    {
        return $this->sortedBooks;
    }
}