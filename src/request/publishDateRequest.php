<?php

namespace App\request;

class publishDateRequest
{
    function findBookBypublishDate(array $books, ...$targetpublishDates)
    {
        $foundBooks = [];

        foreach ($targetpublishDates as $date) {
            foreach ($books as $book) {
                if ($book['publishDate'] === $date) {
                    $foundBooks[] = $book;
                }
            }
        }

        return $foundBooks;
    }
}