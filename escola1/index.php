<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Alunos</title>
</head>
<body>
    <h1>Cadastro de Alunos</h1>
    <a href="form.php">Incluir Aluno</a>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Matrícula</th>
            </tr>
        </thead>
        <tbody>
            <?php require 'listar.php' ; ?>
        </tbody>
    </table>
</body>
</html>