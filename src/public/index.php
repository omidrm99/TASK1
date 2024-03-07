<?php
declare(strict_types=1);
require __DIR__ . '/../../vendor/autoload.php';


use App\request\CommandExecute;


const csv_File_Path = __DIR__ . '/../database/books.csv';
const json_File_Path = __DIR__ . '/../database/books.json';
const command_File_Path = __DIR__ . '\Command.json';




try {
$commandExecute = new CommandExecute();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

echo '<pre>';
print_r($commandExecute->getResults());
echo '</pre>';


