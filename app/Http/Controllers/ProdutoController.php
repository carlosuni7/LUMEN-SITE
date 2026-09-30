<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\ProdutoModel;
use PDO;
class ProdutoController extends Controller
{
    public function index(){
        return view('site.produtos',['title' => 'Produtos', 'nome' => 'Produtos Page']);
    }

    public function showProdutos(){
        $produto = new ProdutoModel();
        $dados = $produto->listarTodosProdutos();
        return $dados;
    }

    public function showProduto($id){
        $produto = new ProdutoModel();
        $dados = $produto->listarProduto($id);
        return $dados;
    }
}
