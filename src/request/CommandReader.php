<?php

namespace App\request;


use App\request\CommandExecute;
use Exception;


class CommandReader
{

    private string $command_name;
    private array $parameters;
    private string $path;
    private mixed $data;
    private $resaults;

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
        $this->parameters = $this->data['parameters'];
    }

    public function commandDetector()
    {
        $commandExecute = new CommandExecute();


            switch ($this->data['command_name']) {
                case "FIND":
                    $commandExecute->findCommand();
                    break;
            }

    }

    public function getResults()
    {
        if (empty($this->resaults)) {
            $this->commandDetector();
        }
        return $this->resaults;
    }
}
