<?php

namespace App\Models\Entities;
class ProdutoModel
{
//    private $id;
    private $loja_id;
    private $nome;
    private $descricao;
    private $preco;
    private $categoria_id;

    /**
     * @param $id
     * @param $loja_id
     * @param $nome
     * @param $descricao
     * @param $preco
     * @param $categoria_id
     */
    public function __construct()
    {
    }

    public function getId(): int
    {
        return $this->id;
    }
    public function getLojaId()
    {
        return $this->loja_id;
    }

    public function setLojaId($loja_id)
    {
        $this->loja_id = intval($loja_id);
        return $this;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
        return $this;
    }

    public function getPreco()
    {
        return $this->preco;
    }

    public function setPreco($preco)
    {

        $this->preco = floatval($preco);
        return $this;
    }

    public function getCategoriaId(){
        return $this->categoria_id;
    }
    public function setCategoriaId($categoria_id){
        $this->categoria_id = intval($categoria_id);
    }
}
