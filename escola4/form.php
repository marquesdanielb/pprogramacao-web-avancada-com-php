<?php 
require 'functions.php'; 

$chave = $_GET['chave'];
$entidade = getEntidade();
$entidade = call_user_func([$entidade, 'get'], $chave);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inclusão de <?=$_GET['cadastro']?></title>
</head>
<body>
    <form method="post" action="gravar.php">
        Nome:
        <input type="text" name="nome" value="<?= (!is_null($entidade->nome)) ? $entidade->nome : ''; ?>" autofocus="autofocus">
        <input type="hidden" name="chave" value="<?=$chave;?>">
        <input type="hidden" name="cadastro" value="<?=$_GET['cadastro'];?>">
        <input type="submit" value="gravar">
    </form>
</body>
</html>