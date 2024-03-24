<?php

namespace App\request;

use App\request\finder\ISBNRequest;
use App\request\finder\AuthorNameRequest;
use App\request\finder\BookTitleRequest;
use App\request\finder\PublishDateRequest;


class CommandExecute
{
    private $data = new CommandReader();
    private $result;

    private function findCommand()
    {
        $commandReader = new CommandReader();
        $ISBN = new ISBNRequest;
        $AuthorName = new AuthorNameRequest;
        $BookTitle = new BookTitleRequest;
        $PublishDate = new PublishDateRequest;
        $this->data = $commandReader->getCommand();

        switch ($this->data['command_name'][1]) {
            case "isbn":
                foreach ($this->data['parameters'] as $isbn) {
                    $ISBN->findBookByISBN($isbn);
                }
                $this->result = $ISBN->getSortedBooks();
                break;
            case "authorname":
                foreach ($this->data['parameters'] as $author) {
                    $AuthorName->findBookByAuthorName($author);
                }
                $this->result = $AuthorName->getSortedBooks();
                break;
            case "booktitle":
                foreach ($this->data['parameters'] as $title) {
                    $BookTitle->findBookBookTitle($title);
                }
                $this->result = $BookTitle->getSortedBooks();
                break;
            case "publishdate":
                foreach ($this->data['parameters'] as $date) {
                    $PublishDate->findBookBypublishDate($date);
                }
                $this->result = $PublishDate->getSortedBooks();
                break;
        }
    }

    private function addCommand()
    {
    }

    public function getResult()
    {
        switch ($this->data['command_name'][0]){
            case "FIND":
                $this->findCommand();
                break;
            case "ADD":
                $this->addCommand();
                break;
        }
        return $this->result;
    }

}