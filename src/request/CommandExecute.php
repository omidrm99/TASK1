<?php

namespace App\request;

use App\request\CommandReader;
use App\request\finder\ISBNRequest;
use App\request\finder\AuthorNameRequest;
use App\request\finder\BookTitleRequest;
use App\request\finder\PublishDateRequest;


class CommandExecute
{
    private array $results;
    private $parameters;

    public function findCommand()
    {
        $ISBN = new ISBNRequest();
        $authorName = new AuthorNameRequest();
        $bookTitle = new BookTitleRequest();
        $publishDate = new PublishDateRequest();




    }

}