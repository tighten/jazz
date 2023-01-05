<?php

namespace Tighten\Jazz;

class Jazz
{
    public function __construct()
    {
    }

    // @todo: Refactor all of these to collections
    public function consoleTable(string|array $data): void {
        if (is_string($data)) {
            echo $data . "\n";
            return;
        }

        $headers = array_merge(['(index)'], consoleTableHeaders($data));

        $table = new LucidFrame\Console\ConsoleTable();
        $table->setHeaders($headers);

        $rows = consoleTableRows($data);

        foreach ($rows as $rowIndex => $row) {
            $table->addRow(array_merge([$rowIndex], array_values($row)));
        }

        $table->display();
    }

    public function consoleTableHeaders(array $data): array
    {
        $headers = [];

        foreach ($data as $row) {
            foreach ($row as $key => $dataal) {
                if (! in_array($key, $headers)) {
                    $headers[] = $key;
                }
            }
        }

        return $headers;
    }

    public function consoleTableRows(array $data): array
    {
        $headers = array_flip(consoleTableHeaders($data));

        foreach ($headers as $key => $val) {
            $headers[$key] = 0;
        }

        foreach ($data as &$row) {
            $row = array_merge($headers, $row);
        }

        return $data;
    }

    public function consoleLog(...$params): void {
        foreach ($params as $param) {
            echo $param . ' ';
        }

        echo PHP_EOL;
    }
}
