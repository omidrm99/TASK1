<?php

namespace App\request;


use Exception;
use App\request\CommandExecute;


class CommandReader
{

    private string $command_name;
    private array $parameters;
    private array $parameterValues;
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
        $this->parameters = $this->data['parameters'];
    }


    private function parameterExtractor(): void
    {
        $all_values = $this->parameters;
        foreach ($all_values as $values) {
            $this->parameterValues = $values;
        }
    }
    public function getParameterValues(): array
    {   if (empty($this->parameterValues)){
        $this->parameterExtractor();
        return $this->parameterValues;
    }
        return $this->parameterValues;
    }

    public function commandDetector(): void
    {
        $commandExecute = new CommandExecute();

        if ($this->command_name === 'FIND') {
            $commandExecute->findCommand();
            $this->parameterExtractor();
        }
    }
}
