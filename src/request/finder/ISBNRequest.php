<?php

declare(strict_types=1);

namespace App\request\finder;

use App\dataBaseReader\Merger;


class ISBNRequest
{
    function findBookByISBN(array $books, ...$targetISBNs)
    {
        $foundBooks = [];

        foreach ($targetISBNs as $isbn) {
            foreach ($books as $book) {
                if ($book['ISBN'] === $isbn) {
                    $foundBooks[] = $book;
                }
            }
        }

        return $foundBooks;
    }

}