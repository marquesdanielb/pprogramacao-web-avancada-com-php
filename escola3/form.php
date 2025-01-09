<?php require 'entidade.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inclusão de <?=$cadastro?></title>
</head>
<body>
    <form method="post" action="gravar.php">
        Nome:
        <input type="text" name="nome" value="<?=$nome;?>" autofocus="autofocus">
        <input type="hidden" name="chave" value="<?=$chave;?>">
        <input type="hidden" name="cadastro" value="<?=$cadastro;?>">
        <input type="submit" value="gravar">
    </form>
</body>
</html>