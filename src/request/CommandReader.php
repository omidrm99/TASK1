<?php

namespace App\request;

use Exception;
use App\request\finder\ISBNRequest;

class CommandReader
{

    private string $command_name;
    private array $parameters;
    private array $results;
    private string $path;
    private mixed $data;

    public function __construct(string $path)
    {
        $this->path = $path;
        $this->readCommandFile();
    }

    private function readCommandFile()
    {
        $commandData = file_get_contents($this->path);
        if ($commandData !== false) {
            $data = json_decode($commandData, true);
            if ($data !== null && isset($data['parameters'])) {
                $this->data = $data;
            } else {
                throw new Exception("Error decoding JSON");
            }
        } else {
            throw new Exception("Error decoding JSON");
        }
        $this->command_name = $this->data['command_name'];
        $this->parameters = $this->data['parameters']['isbns'];
    }

    private function commandDetector()
    {
        $ISBNFinder = new ISBNRequest();


        if ($this->command_name === 'FIND') {
            foreach ($this->parameters as $parameter){
                $ISBNFinder->findBookByISBN($parameter);
            }
            $this->results = $ISBNFinder->getSortedBooks();
        }
    }

    public function getResults()
    {
        if (empty($this->results)) {
            $this->commandDetector();
        }
        return $this->results;
    }
}
