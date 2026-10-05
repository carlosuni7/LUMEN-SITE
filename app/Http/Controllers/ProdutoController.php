<?php

namespace App\Http\Controllers;

use App\Models\Entities\ProdutoModel;
use App\Models\Repositories\ProdutoRepository;

class ProdutoController extends Controller
{
    public function index(){
        return view('site.produtos.form',['title' => 'Produtos']);
    }

    public function ListarTodosProdutos(){
        $produto = new ProdutoRepository();
        $dados = $produto->listarTodosProdutos();
        $resultado = [
            "message" => "Produtos Encontrado com Sucesso!",
            "status" => 200,
            "data" => $dados,
        ];
        return json_encode($resultado, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }

    public function ListarProduto($id){
        $produto = new ProdutoRepository();
        $dados = $produto->listarProduto($id);
        $resultado = [
            "message" => "Produto encontrado com Sucesso!",
            "status" => 200,
            "data" => $dados,
        ];
        return json_encode($resultado, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    public function CadastrarProduto(ProdutoModel $prod){
        $produto = $prod;
        $repository = new ProdutoRepository();
        $repository->inserirProduto($produto);

        $resultado = [
            "message" => "Produto encontrado com Sucesso!",
            "status" => 200,
            "data" => $dados,
        ];
        return json_encode($resultado, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    public function ExcluirProduto($id){
        $repository = new ProdutoRepository();
        $res = $repository->excluirProduto($id);
        $resultado = [
            "status" => $res ? 200 : 500,
            "message" => $res ? "Produto removido com sucesso!" : "Produto Excluido!",
            "id" => $id
        ];

        return json_encode($resultado, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }
}
