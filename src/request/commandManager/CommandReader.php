<?php

namespace App\request\commandManager;


use App\dataBaseReader\Merger;
use Exception;


class CommandReader
{
    private mixed $data;
    private array $resaults;

    public function __construct()
    {
        $this->readCommandFile();
    }

    private function readCommandFile(): void
    {
        $path = __DIR__ . '/../public/Command.json';
        $commandData = file_get_contents($path);
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



        if (in_array($this->data['command_name'][0], ["FIND", "ADD"])){
            $this->resaults = $commandExecute->getResult();
        }else{
            $this->resaults = $allBooks->getSortedBooks();
        }
    }

    public function getResults(): array
    {

        if (empty($this->resaults)) {
            $this->commandDetector();
        }
        return $this->resaults;
    }

    public function getCommand(): mixed
    {
        return $this->data;
    }
}
