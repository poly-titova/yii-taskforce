<?php

namespace TaskForce;

use Exceptions\TaskForceException;

class CSVToSQLConverter
{
    public $CSVFileObject;

    public function createSQLFromCSV($file, $directory): void
    {
        if (!file_exists($file)) {
            throw new TaskForceException('Файл не существует');
        }

        if (!file_exists($directory)  && !mkdir($directory)) {
            throw new TaskForceException('Не удалось создать дуректорию');
            mkdir($directory);
        }

        try {
            $this->CSVFileObject = new \SplFileObject($file, 'r');
        } catch (TaskForceException $exception) {
            throw new TaskForceException('Не удалось открыть файл на чтение');
        }

        $this->CSVFileObject->setFlags(\SplFileObject::DROP_NEW_LINE | \SplFileObject::READ_AHEAD | \SplFileObject::SKIP_EMPTY | \SplFileObject::READ_CSV);

        $headerData = implode(', ', $this->getHeaderData());

        $values[] =
            sprintf(
                "\t(%s)",
                implode(', ', array_map(function ($item) {
                    return "'{$item}'";
                }, $this->CSVFileObject->fgetcsv(',')))
            );

        print($values);

        $newFile = basename($file, '.csv');

        try {
            $SQLFileObject = new \SplFileObject("$directory/$newFile.sql", 'w');
        } catch (TaskForceException $exception) {
            throw new TaskForceException('Не удалось создать или записать в файл');
        }

        $SQLFileObject->fwrite("INSERT INTO $newFile ($headerData) VALUES ");
    }

    public function getHeaderData(): ?array
    {
        $data = $this->CSVFileObject->fgetcsv();

        return $data;
    }
}
