<?php

$commands = [
    'add' => [\App\request\commandManager\CommandExecute::class, \App\request\commandManager\CommandReader::class],
    'read' => [\App\request\commandManager\CommandExecute::class],
];

$parameter = 'add';
$commands[$parameter][0];