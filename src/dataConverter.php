<?php
declare(strict_types = 1);
ini_set('display_errors', 'On');
error_reporting(E_ALL);

require_once 'vendor/autoload.php';

use Exceptions\TaskForceException;
use TaskForce\CSVToSQLConverter;

$directory = new FilesystemIterator('data');

foreach ($directory as $file) {
    $csvToSqlConverter = new CSVToSQLConverter($file->getPathname(), 'requests');

    try {
        $csvToSqlConverter->createSQLFromCSV($file->getPathname(), 'requests');
    } catch (TaskForceException $e) {
        error_log('Не удалось обработать csv файл: ' . $e->getMessage());
    }
}
