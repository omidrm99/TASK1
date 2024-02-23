<?php

declare(strict_types=1);


require __DIR__ . '/../../vendor/autoload.php';

use App\getdatabase\CsvReader;



// csv fil reader section
const csv_File_Path = __DIR__ . '/../database/books.csv';
$CsvReader = new CsvReader(csv_File_Path);
$no = $CsvReader->getData();
echo '<pre>';
print_r($no);
echo '</pre>';
