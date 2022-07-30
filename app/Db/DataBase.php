<?php

namespace App\Db;

use PDO, PDOException;

class DataBase
{

    #region
    /**
     * Host de conexão com o banco de dados.
     * @var string
     */
   const HOST = '127.0.0.1';
   
   /**
    * Nome do banco de dados.
    * @var string
    */
   const NAME = 'db_vagas';

   /**
    * Nome do usuario do banco de dados.
    * @var string
    */
   const USER = 'developer';

   /**
    * Senha do banco de dados.
    *@var string
    */
   const PASS = '@a1b2c3d4e5';


   /**
    * Nome da tabela a ser manipulado.
    *
    * @var string
    */
    private string $table;

    /**
     * Instância de conexao com o banco de *  dados.
     *
     * @var PDO
     */
    private PDO $connection;

    #endregion

    /**
     * Instância da Classe.
     *
     * @param string $table
     */
    public function __construct($table = null)
    {
        $this->table = $table;
        $this->setConnection();
    }

    /**
     * Método responsável por criar uma conexão com a base
     *
     * @return void
     */
    private function setConnection()
    {
        try {
            $this->connection = new PDO(
                'mysql:host='.self::HOST.
                ';dbname='.self::NAME,
                self::USER,
                self::PASS
            );

            $this->connection->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );

        } catch (PDOException $exeception) {
            die('ERROR: ' . $exeception->getMessage());
        }
    }


    /**
     * Método responsável por executar queries dentro da base
     *
     * @param string $query
     * @param array  $params
     * @return PDOStatement
     */
    public  function execute($query, $params = [])
    {
        try {
            $statement = $this->connection->prepare($query);
            $statement->execute($params);

            return $statement; 

        } catch (PDOException $exeception) {
            die('ERROR: ' . $exeception->getMessage());
        }
    }

    /**
     * Métedo responsável por inserir dados no banco
     *
     * @param array $values [field => value] 
     * @return int ID inserido
     */
    public function insert($values)
    {
        //DADOS DA QUERY
        $fields = array_keys($values);
        $binds  = array_pad([], count($values), '?');

        //MONTA A QUERY
        $query = 'INSERT INTO '.$this->table.' ('.implode(',',$fields).') VALUES ('.implode(',',$binds).')';  

        //EXECUTA A QUERY
        $this->execute($query, array_values($values));

        //RETORNA O ID INSERIDO
        return $this->connection->lastInsertId();
        
    }

}

