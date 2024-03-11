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
    private $result;

    public function findCommand()
    {
        $commandReader = new CommandReader();
        $ISBN = new ISBNRequest;
        $AuthorName = new AuthorNameRequest;
        $BookTitle = new BookTitleRequest;
        $PublishDate = new PublishDateRequest;
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
                $this->result = $ISBN->getSortedBooks();
                break;
            case "authorname":
                $value = true;
                foreach ($commandReader->getData() as $author) {
                    if ($value) {
                        $value = false;
                        continue;
                    }
                    $AuthorName->findBookByAuthorName($author);
                }
                $this->result = $AuthorName->getSortedBooks();
                break;
            case "booktitle":
                $value = true;
                foreach ($commandReader->getData() as $title) {
                    if ($value) {
                        $value = false;
                        continue;
                    }
                    $BookTitle->findBookBookTitle($title);
                }
                $this->result = $BookTitle->getSortedBooks();
                break;
            case "publishdate":
                $value = true;
                foreach ($commandReader->getData() as $date) {
                    if ($value) {
                        $value = false;
                        continue;
                    }
                    $PublishDate->findBookBypublishDate($date);
                }
                $this->result = $PublishDate->getSortedBooks();
                break;
        }
    }

    public function getResult()
    {
        if (empty($this->result))
            $this->findCommand();
        return $this->result;
    }

}