<?php

namespace App\Models\Entities;
class ProdutoModel
{
//    private $id;
    private int $id;
    private int $loja_id;
    private String $nome;
    private String $descricao;
    private $preco;
    private int $categoria_id;

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
    public function setId(int $id){
        $this->id = $id;
    }
    public function getLojaId()
    {
        return $this->loja_id;
    }

    public function setLojaId(int $loja_id)
    {
        $this->loja_id = intval($loja_id);
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome(String $nome)
    {
        $this->nome = $nome;

    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao(String $descricao)
    {
        $this->descricao = $descricao;
    }

    public function getPreco()
    {
        return $this->preco;
    }

    public function setPreco($preco)
    {
        $this->preco = floatval($preco);
    }

    public function getCategoriaId(){
        return $this->categoria_id;
    }
    public function setCategoriaId($categoria_id){
        $this->categoria_id = intval($categoria_id);
    }
}
