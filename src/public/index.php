<?php
declare(strict_types=1);
require __DIR__ . '/../../vendor/autoload.php';


use App\request\CommandExecute;
use App\request\CommandReader;


const csv_File_Path = __DIR__ . '/../database/books.csv';
const json_File_Path = __DIR__ . '/../database/books.json';
const command_File_Path = __DIR__ . '\Command.json';



try {
$commandExecute = new CommandExecute();
$CommandReader =new CommandReader(command_File_Path);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

echo '<pre>';
print_r($CommandReader->getResults());
echo '</pre>';


