<?php
require 'functions.php';
use Entidade\Professor;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Professores</title>
</head>
    <body>
        <h1>Cadastro de professores</h1>
        <a href="form.php?cadastro=professores">Incluir professores</a>
        <table>
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    echo Professor::listar();
                ?>
            </tbody>
        </table>
        <a href="index.php">Homepage</a>
    </body>
</html>