<?php

namespace Entidade;

class Professor extends EntidadeAbstrata
{
    /**
     * 
     * @var integer
     */
    public $codigo;

    /**
     * 
     * 
     * 
     @var string
     */
    public $nome;

    protected static $tabela = 'professores';

    public static function getChave()
    {
        return 'codigo';
    } 
}
