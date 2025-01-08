<?php

define('DS', DIRECTORY_SEPARATOR);

$matricula = isset($_GET['matricula']) ? $_GET['matricula'] : NULL;

if (! is_null($matricula)) {
    $filename = __DIR__ . DS . 'alunos.txt';

    require 'arquivo.php';

    $handle = fopen($filename, 'r');

    $tmpFilename = __DIR__ . DS . 'alunos.tmp';
    $tmpHandle = fopen($tmpFilename, 'w');
    while (! feof($handle)) {
        $row = fread($handle, 80);
        $record = explode(',', $row);
        $ultimaMatricula = (isset($record[0]) && empty($record[0])) ? $ultimaMatricula : $record[0];

        if ($ultimaMatricula != $matricula) {
            fwrite($tmpHandle, $row);
        }
    }
    fclose($tmpHandle);
    unlink($filename);
    copy($tmpFilename, $filename);
    unlink($tmpFilename);
}
header('Location: index.php');