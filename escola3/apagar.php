<?php

require 'pdo.php';
require 'functions.php';

$cadastro = isset($_GET['cadastro']) ? $_GET['cadastro'] : NULL;
$nomeChave = getChave($cadastro);

$chave = (integer) (isset($_GETT['chave']) ? $_GET['chave'] : NULL);

$pdo->exec("DELETE FROM $cadastro WHERE $nomeChave=$chave");

header("Location: index.php");