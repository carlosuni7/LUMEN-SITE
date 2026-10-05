<?php

namespace App\Models\Entities;
class ProdutoModel
{
    private $id;
    private $loja_id;
    private $nome;
    private $descricao;
    private $preco;
    private $estoque;

    /**
     * @param $id
     * @param $loja_id
     * @param $nome
     * @param $descricao
     * @param $preco
     * @param $estoque
     */
    public function __construct(int $id,int $loja_id,string $nome,string $descricao,float $preco,int $estoque)
    {
        $this->id = $id;
        $this->loja_id = $loja_id;
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->preco = $preco;
        $this->estoque = $estoque;
    }

    public function getId(): int
    {
        return $this->id;
    }
    public function getLojaId()
    {
        return $this->loja_id;
    }

    public function setLojaId($loja_id): produtoModel
    {
        $this->loja_id = $loja_id;
        return $this;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome): produtoModel
    {
        $this->nome = $nome;
        return $this;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao): produtoModel
    {
        $this->descricao = $descricao;
        return $this;
    }

    public function getPreco()
    {
        return $this->preco;
    }

    public function setPreco($preco): produtoModel
    {
        $this->preco = $preco;
        return $this;
    }

    public function getEstoque()
    {
        return $this->estoque;
    }

    public function setEstoque($estoque): produtoModel
    {
        $this->estoque = $estoque;
        return $this;
    }
}
