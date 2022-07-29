<?php

namespace App\Entity;

use App\Db\DataBase;

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



    public function cadastrar()
    {
        //DEFINIR A DATA
        $this->data = date('Y-m-d H:i:s');

        //INSERIE A VAGA NO BANCO
        $obDataBase = new DataBase('vagas'); 
        $obDataBase->insert([
            'titulo'    => $this->titulo,
            'descricao' => $this->descricao,
            'ativo'     => $this->ativo,
            'data'      => $this->data
        ]);

        echo '<pre>';
            print_r($obDataBase); 
        echo '</pre>'; 
        exit;

    }
}