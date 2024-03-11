<?php

namespace App\request;


use App\request\CommandExecute;
use Exception;
use App\dataBaseReader\Merger;


class CommandReader
{
    private string $path;
    private mixed $data;
    private $resaults;

    public function __construct()
    {
        $this->readCommandFile();
    }

    private function readCommandFile(): void
    {
        $this->path = __DIR__ . '/../public/Command.json';
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
        $this->parameters = $this->data['parameters'];
    }

    private function commandDetector(): void
    {
        $commandExecute = new CommandExecute();
        $allBooks = new Merger();

        switch ($this->data['command_name'][0]) {
            case "ALL":
                $this->resaults = $allBooks->getSortedBooks();
                break;
            case "FIND":
                $commandExecute->findCommand();
                $this->resaults = $commandExecute->getResult();
                break;
        }
    }

    public function getResults()
    {
        $CommandExecute = new CommandExecute();

        if (empty($this->resaults)) {
            $this->commandDetector();
        }
        return $this->resaults;
    }

    public function getData(): mixed
    {
        return $this->data;
    }
}
