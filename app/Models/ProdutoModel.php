<?php

namespace App\Models;
use App\Models\Conexao;
use PDO;
class ProdutoModel extends Conexao
{
    private $id;
    private $loja_id;
    private $nome;
    private $descricao;
    private $preco;
    private $estoque;

    public function __construct(){
        parent::__construct();
    }

    public function listarProduto($id): array{

        $statement = $this->pdo->prepare("select * from produtos where id = :id");
        $statement->execute([
            "id" => $id
        ]);

        $dados = $statement->fetch(PDO::FETCH_ASSOC);
        return $dados;
    }

    public function listarTodosProdutos(): array {
        $produtos = $this->pdo->query("select * from produtos order by nome")->fetchAll(PDO::FETCH_ASSOC);
        return $produtos;
    }

    public function inserirProduto(ProdutoModel $prod){
        $statment = $this->pdo->prepare("
        insert into produtos (lojaId, nome, preco, estoque)
        values (:lojaId, :nome, :preco, :estoque) ");
        $statment->execute([
            "lojaId" => $prod->getLojaId(),
            "nome" => $prod->getNome(),
            "preco" => $prod->getPreco(),
            "estoque" => $prod->getEstoque(),
        ]);
    }

    public function alterarProduto(ProdutoModel $prod){
        $statment = $this->pdo->prepare("
        update produtos
        set lojaId = :lojaID, nome = :nome, preco = :preco, estoque = :preco
        where lojaId id = :id;
        ");
        $statment->execute([
            "lojaId" => $prod->getLojaId(),
            "nome" => $prod->getNome(),
            "preco" => $prod->getPreco(),
            "estoque" => $prod->getEstoque(),
            "id" => $prod->getId(),
        ]);
    }

    public function excluirProduto(int $id): void {
        $statment = $this->pdo->prepare("delete from produtos where id = :id;");
        $statment->execute([
            "id" => $id,
        ]);
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
