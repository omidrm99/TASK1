<?php

namespace App\request\finder;

class BookTitleRequest
{

    function findBookByTitle(array $books, ...$targetTitles)
    {
        $foundBooks = [];

        foreach ($targetTitles as $title) {
            foreach ($books as $book) {
                if ($book['bookTitle'] === $title) {
                    $foundBooks[] = $book;
                }
            }
        }

        return $foundBooks;
    }
}