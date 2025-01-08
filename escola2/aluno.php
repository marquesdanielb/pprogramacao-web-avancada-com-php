<?php
require 'pdo.php';

$matricula = (integer) (isset($_GET['matricula']) ? $_GET['matricula'] : NULL);

$sql = "SELECT nome FROM alunos WHERE matricula = $matricula";
$resultSet = $pdo->query($sql);
$nome = $resultSet->fetchColumn();
