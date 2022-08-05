<?php

namespace App\Entity;

use App\Db\DataBase;
use PDO;

/**
 * Undocumented Class
 */
Class Vaga
{
    #region
    /**
     * Identificador unico da vaga.
     *
     * @var integer
     */
    public int $id;

    /**
     * Titulo da vaga
     *
     * @var string
     */
    public string $titulo;


    /**
     * Descrição da vaga
     *
     * @var string
     */
    public string $descricao;

    /**
     * Define se a vaga esta avita ou não.
     *
     * @var string (s/n)
     */
    public string $ativo;

    /**
     * Data de publicação da vaga
     *
     * @var string
     */
    public string $data;

    #endregion


    /**
     * Metedo responsavel por cadastrar uma vaga na base
     *
     * @return bool
     */
    public function cadastrar()
    {
        //DEFINIR A DATA
        $this->data = date('Y-m-d H:i:s');

        //INSERIE A VAGA NO BANCO
        $obDataBase = new DataBase('vagas'); 
        $this->id = $obDataBase->insert([
            'titulo'    => $this->titulo,
            'descricao' => $this->descricao,
            'ativo'     => $this->ativo,
            'data'      => $this->data
        ]);

        return true;
    }

    /**
     * metedo responsavel ppor atualizar a vaga no banco
     *
     * @return boolean 
     */
    public function atualizar()
    {
        return (new DataBase('vagas'))->update('id = '. $this->id,[
            'titulo'    => $this->titulo,
            'descricao' => $this->descricao,
            'ativo'     => $this->ativo,
            'data'      => $this->data
        ]);
    }

    /**
     * Metedo responsavel por obter as vagas do banco de dados
     *
     * @param string $where
     * @param string $order
     * @param string $limit
     * @return array
     */
    public static function getVagas($where = null, $order = null, $limit = null)
    {
        return (new DataBase('vagas'))->select($where, $order, $limit)
                                      ->fetchAll(PDO::FETCH_CLASS, self::class);
    }


    /**
     * Metedo responsavel por buscar uma vaga na base
     *
     * @param int $id
     * @return Vaga
     */
    public static function getVaga(int $id)
    {
        return (new DataBase('vagas'))->select(' id = '.$id)->fetchObject(self::class);
    }
}