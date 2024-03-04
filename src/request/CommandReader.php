<?php

namespace App\request;

use Exception;

class CommandReader
{
    private string $command_name;
    private array $parameters;

    public function __construct($json_file) {
        $json_data = file_get_contents($json_file);
        $data = json_decode($json_data, true);

        if ($data === null) {
            throw new Exception("Error decoding JSON");
        }

        $this->command_name = $data['command_name'];
        $this->parameters = $data['parameters'];
    }




    public function getCommandName() {
        return $this->command_name;
    }

    public function getParameters() {
        return $this->parameters;
    }

    public function getISBNs() {
        return $this->parameters['isbns'];
    }
}
