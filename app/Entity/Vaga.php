<?php

namespace App\Entity;

Class Vaga
{
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


    /**
     * Método responsável por cadastrar uma * nova vaga no banco.
     *
     * @return boolean
     */
    public function cadastrar():bool
    {
        //DEFINIR A DATA.
        $this->data = date('Y-m-d H:i:s');

        return true;
    }
}