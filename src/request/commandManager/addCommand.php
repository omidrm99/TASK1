<?php

namespace App\request\commandManager;

use App\request\CommandReader;

class addCommand
{
    private array $result;
    private array $data;

    public function getResult(): array
    {
        $commandReader = new CommandReader();
        $this->data = $commandReader->getCommand();
        $this->addCommand();
        return $this->result;
    }
    private function addCommand()
    {
        echo 1;
        exit;
    }
}