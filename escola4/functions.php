<?php
function getCadastro() {
    return (isset($_GET['cadastro'])) ? $_GET['cadastro'] : $_POST['cadastro'];
}

function getEntidade() {
    $cadastro = getCadastro();
    $entidade = ($cadastro == 'alunos' ? 'Aluno' : 'Professor');
    return 'Entidade\\' . $entidade;
}

function autoload($className) {
    $fillename = str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';
    require $fillename;
}
spl_autoload_register('autoload');
