<?php

namespace App\request;

use App\request\CommandReader;
use App\request\finder\ISBNRequest;
use App\request\finder\AuthorNameRequest;
use App\request\finder\BookTitleRequest;
use App\request\finder\PublishDateRequest;


class CommandExecute
{
    private $data;

    public function findCommand()
    {
        $commandReader = new CommandReader();
        $ISBN = new ISBNRequest;
        $AuthorName = new AuthorNameRequest;
        $bookTitle = new BookTitleRequest;
        $publishDate = new PublishDateRequest;
        $this->data = $commandReader->getData();

        switch ($this->data[0]) {
            case "isbn":
                $value = true;
                foreach ($commandReader->getData() as $isbn) {
                    if ($value) {
                        $value = false;
                        continue;
                    }
                    $ISBN->findBookByISBN($isbn);
                }
                var_dump($ISBN->getSortedBooks());
                break;
            case "publishDate":
                $value = true;
                foreach ($commandReader->getData() as $authorName) {
                    if ($value) {
                        $value = false;
                        continue;
                    }
                    $AuthorName->findBookByAuthorName($authorName);
                }
                var_dump($AuthorName->getSortedBooks());
                break;
        }
    }

}