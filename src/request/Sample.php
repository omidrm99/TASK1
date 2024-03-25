<?php

$commands = [
    'add' => [\App\request\CommandExecute::class, \App\request\CommandReader::class],
    'read' => [\App\request\CommandExecute::class],
];

$parameter = 'add';
$commands[$parameter][0];