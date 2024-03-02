<?php

declare(strict_types=1);

namespace App\request;

use App\dataBaseReader\getData;
use App\dataBaseReader\Merger;
use App\request\PublishDateSorter;


class ISBNRequest
{

    private array $foundBooks = [];
    private array $sortedBooks = [];


    public function __construct(array $books, ...$targetISBNs)
    {
        foreach ($targetISBNs as $isbn) {
            foreach ($books as $book) {
                if ($book['ISBN'] === $isbn) {
                    $this->foundBooks = $book;
                }
            }
        }
    }

    public function sortByPublishDate(): array
    {
       $PublishDateSorter = new PublishDateSorter($this->foundBooks);
        $this->sortedBooks = $PublishDateSorter->getSortedData();
        return $this->sortedBooks;
    }

    public function getSortedData(): array
    {
        return array_values($this->sortedBooks);
    }

}