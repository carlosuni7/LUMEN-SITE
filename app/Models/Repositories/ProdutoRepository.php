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

        $sql = "insert into produtos (lojaId, nome, preco, estoque) values (:lojaId, :nome, :preco, :estoque)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":lojaId",$prod->getLojaId());
        $stmt->bindValue(":nome",$prod->getNome());
        $stmt->bindValue(":preco",$prod->getPreco());
        $stmt->bindValue(":estoque",$prod->getEstoque());
        $stmt->execute();
        // retorna o número de linhas afetadas pela última instrução
        if($stmt->rowCount() < 0){
            return false;
        }
        return true;
    }

    public function atualizarProduto( ProdutoModel $prod ){
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
