<?php

namespace App\request;
use App\request\CommandReader;
use App\request\finder\ISBNRequest;

class CommandExecute
{

    private array $results;
    private $parameters;

    public function findCommand()
    {
        $commandReader = new CommandReader();

        $ISBNFinder = new ISBNRequest();
        foreach ($this->parameters as $parameter){
            $ISBNFinder->findBookByISBN($parameter);
        }
        $this->results = $ISBNFinder->getSortedBooks();
    }
    public function getResults(): array
    {
        if (empty($this->results)) {
            $this->findCommand();
        }
        return $this->results;
    }
}