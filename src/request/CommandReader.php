<?php

namespace App\request;


use Exception;
use App\request\CommandExecute;


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


//    private function parameterExtractor(): void
//    {
//     //   return array_keys($this->parameters);
//
//        if (!empty($this->parameters) && isset($this->parameters[$key])) {
//           // return $inputArray[$key];
//        } else {
//            // Return an empty array if the specified key is not found or input array is empty
//            //return [];
//        }
//
//        $all_values = $this->parameters;
//        foreach ($all_values as $values) {
//            $this->parameterValues = $values;
//        }
//    }

//    public function getParameterValues(): array
//    {
//        if (empty($this->parameterValues)) {
//            // $this->parameterExtractor();
//            $this->parameterKey;
//            var_dump($this->parameterKey);
//            exit();
//        }
//        return $this->parameterValues;
//    }

    public function commandDetector(): void
    {
        $commandExecute = new CommandExecute();

        if ($this->command_name === 'FIND') {
            $commandExecute->findCommand();
        }
    }

    public function getResults()
    {
        return $this->resaults;
    }

    public function getCommandName(): string
    {
        return $this->command_name;
    }
}
