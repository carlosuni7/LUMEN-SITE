<?php

namespace App\Models\Repositories;

use App\Models\Conexao;
use App\Models\Entities\ProdutoModel;

use Illuminate\Http\Request;
use PDO;
class ProdutoRepository extends Conexao
{
    public function __construct(){
        parent::__construct();
    }
    public function listarProduto(int $id): array|false{
        $sql = "SELECT * FROM produtos WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        // O valor retornado por esta função em caso de sucesso depende do tipo de busca. Em todos os casos, false é retornado em caso de falha ou se não houver mais linhas.
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data ?: [];
    }


    public function listarTodosProdutos(): array {
        $sql = "SELECT * FROM produtos";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        // Retorna um array contendo todas as linhas restantes no conjunto de resultados. O array representa cada linha como um array de valores
        // Retorna array VAZIO se não houver resultados
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $data ?: [];
    }

    public function cadastrarProduto(ProdutoModel $prod){

        $sql = "insert into produtos (nome, descricao, preco, ativo, id_loja, id_categoria) values (:nome, :descricao, :preco, :ativo, :id_loja, :id_categoria)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":nome",$prod->getNome());
        $stmt->bindValue(":descricao",$prod->getDescricao());
        $stmt->bindValue(":preco",$prod->getPreco());
        $stmt->bindValue("ativo", 1);
        $stmt->bindValue("id_loja", $prod->getLojaId());
        $stmt->bindValue("id_categoria", $prod->getCategoriaId());
        $sucesso = $stmt->execute();
        // retorna o número de linhas afetadas pela última instrução
        if (!$sucesso || $stmt->rowCount() === 0) {
            return false;
        }
        return true;
    }

    public function atualizarProduto( ProdutoModel $prod){
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

    public function excluirProduto(int $id): bool {
        $sql = "DELETE FROM produtos WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $count = $stmt->rowCount();

        return $count;
    }

}
