<?php

namespace App\request;

use Exception;
use App\request\finder\ISBNRequest;
use App\dataBaseReader\Merger;

class CommandReader
{

    private string $command_name;
    private array $parameters;
    private array $parameterValues;
    private array $results;

    public function __construct($json_file)
    {
        $json_data = file_get_contents($json_file);
        $data = json_decode($json_data, true);

        if ($data === null) {
            throw new Exception("Error decoding JSON");
        }

        $this->command_name = $data['command_name'];
        $this->parameters = $data['parameters'];
        $this->parameterValues = $this->parameters['isbns'];
    }


    private function commandDetector()
    {
        $merger = new Merger();

        $ISBNFinder = new ISBNRequest();

        if ($this->command_name === 'FIND') {
            $ISBNFinder->findBookByISBN($merger->getMergedData(),$this->parameterValues);
            $this->results = $ISBNFinder->getSortedBooks();
        }
    }

    public function getResults()
    {
        if (!empty($this->results)){
            $this->commandDetector();
        }
        return $this->results;
    }

    public function getCommandName()
    {
        return $this->command_name;
    }

    public function getParameters()
    {
        return $this->parameters;
    }

    public function getISBNs()
    {
        return $this->parameters['isbns'];
    }
}
