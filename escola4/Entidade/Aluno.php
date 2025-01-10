<?php

namespace Entidade;

class Aluno extends EntidadeAbstrata
{
    /**
     * 
     * @var integer
     */
    public $matricula;

    /**
     * 
     * 

     @var string
     */
    public $nome;

    protected static $tabela = 'alunos';

    public static function getChave()
    {
        return 'matricula';
    }
}
