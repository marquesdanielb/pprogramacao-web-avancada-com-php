<?php

namespace Entidade;

abstract class EntidadeAbstrata
{
    /**
     * 
     * @var \PDO
     */
    protected static $pdo = NULL;
    
    protected static $tabela = NULL;
    
    /**
     * get/set genéricos
     * @param string $method
     * @param array $args
     * @return mixed
     */
    public function __call($method, array $args)
    {
        $prefix = substr($method, 0, 3);
        if ($prefix == 'get') {
            $attribute = lcfirst(substr($method, 4));
            return $this->$attribute;
        }

        if ($prefix == 'set') {
            $attribute = lcfirst(substr($method, 3));
            $this->$attribute = $args[0];
            return $this;
        }
    }

    abstract public static function getChave();

    public function getPDO()
    {
        if (self::$pdo == NULL) {
            self::$pdo = new \PDO('mysql:dbname=escola;host=db', 'root', 'root');
        }

        return self::$pdo;
    }
    
    public static function listar()
    {
        $resultSet = self::getPDO()->query('SELECT * FROM ' . static::$tabela);

        $records = $resultSet->fetchAll();

        $chave = static::getChave();
        $cadastro = static::$tabela;
        
        $html = '';
        $tagLinks = [];
        foreach ($records as $record) {
            $tagLinks[0] = "<a href=\"form.php?cadastro=$cadastro&chave={$record['codigo']}\">{$record['codigo']}</a>";
            $tagLinks[1] = "<a href=\"apagar.php?cadastro=$cadastro&chave={$record['codigo']}\">Excluir</a>";
            if (! isset($record['codigo'])) {
                $tagLinks[0] = "<a href=\"form.php?cadastro=$cadastro&chave={$record['matricula']}\">{$record['matricula']}</a>";
                $tagLinks[1] = "<a href=\"apagar.php?cadastro=$cadastro&chave={$record['matricula']}\">Excluir</a>";
            }

            $html .= <<<BLOCO
            <tr>
                <td>
                    {$tagLinks[0]}
                </td>
                <td>
                    {$record['nome']}
                </td>
                <td>
                    {$tagLinks[1]}
                </td>
            </tr>
            BLOCO;
        }

        return $html;
    }

    public static function get($chave)
    {
        $nomeChave = static::getChave();
        $cadastro = static::$tabela;

        if (! is_null($chave)) {
            $resultSet = self::getPDO()->query("SELECT * FROM $cadastro WHERE $nomeChave = $chave");
            $record = $resultSet->fetch(\PDO::FETCH_ASSOC);

            if ($record) {
                $class = get_called_class();

                $entidade = new $class();
                $entidade->setCodigo($record[$nomeChave]);
                $entidade->setNome($record['nome']);

                return $entidade;
            }

            return NULL;
        }
    }

    /**
     * 
     * @param array $dados
     */
    public function gravar(array $dados)
    {
        $nomeChave = static::getChave();
        
        $nome = isset($dados['nome']) ? $dados['nome'] : NULL;
        $chave = (integer) isset($dados['chave']) ? $dados['chave'] : NULL;
        $cadastro = static::$tabela;

        if (! is_null($chave)) {
            $sql = "INSERT INTO $cadastro (nome) VALUES ('$nome')";

            if (! empty($chave)) {
                $sql = "UPDATE $cadastro SET nome = '$nome' WHERE $nomeChave = $chave";
            }

            if (self::getPDO()->exec($sql) === false) {
                throw new \Exception("Não conseguiu gravar o registro");
            }
        }
    }

    public function apagar($chave)
    {
        $chave = (integer) $chave;

        $nomeChave = static::getChave();
        $cadastro = static::$tabela;

        self::getPDO()->exec("DELETE FROM $cadastro WHERE $nomeChave = $chave");
    }
}