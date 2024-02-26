<?php

namespace App\request;

class bookTitleRequest
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