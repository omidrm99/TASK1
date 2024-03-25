<?php

namespace App\request;

use App\request\commandManager\addCommand;
use App\request\commandManager\findCommand;

class CommandExecute
{
    private array $data;
    private array $result;

    public function getResult()
    {
        $commandReader = new CommandReader();
        $this->data = $commandReader->getCommand();
        switch ($this->data['command_name'][0]){
            case "FIND":
                $findCommand = new findCommand();
                $this->result = $findCommand->getResult();
                break;
            case "ADD":
                $addCommand = new addCommand();
                $this->result = $addCommand->getResult();
                break;
        }
        return $this->result;
    }

}