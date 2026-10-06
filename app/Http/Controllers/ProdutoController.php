<?php

namespace App\Http\Controllers;

use App\Models\Entities\ProdutoModel;
use App\Models\Repositories\ProdutoRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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

        return (new Response($resultado, 200))->withHeaders([
            'Content-Type'=>'Application/json',
            'charset'=>'utf-8',
            'Cache-Control'=>'TEM Cache',
            ]);
    }

    public function CadastrarProduto(Request $request){
        $produto = new ProdutoModel();
        $repository = new ProdutoRepository();
        $produto->setNome($request->input('nome'));
        $produto->setDescricao($request->input('descricao'));
        $produto->setPreco($request->input('preco'));
        $produto->setCategoriaId(1);
        $produto->setLojaId(1);

        $repository->cadastrarProduto($produto);
        $resultado = [
            "message" => "Produto cadastrado com Sucesso!",
            "status" => 200,
            "data" => [
                "nome" => $produto->getNome(),
                "descricao" => $produto->getDescricao(),
                "preco" => $produto->getPreco(),
            ],
        ];

        return (new Response($resultado, 200))->withHeaders(["Content-Type"=>"Application/json","charset"=>"utf-8"]);
//        $res = [
//            "cookies" => $request->cookie(),
//            "parsedBody" => $request->getPayload(),
////            "headers" => $request->header(),
//            "method" => $request->Method(), //  retorna o verbo HTTP da requisição.
//            // isMethod() - metodo para verificar se o verbo HTTP corresponde a uma determinada string
//            "url" => $request->url(), //  obter a URL completa, e não apenas o caminho
//            "url-completo" => $request->fullUrl(), //  obter a URL completa, e não apenas o caminho
//            "uri" => $request->path(), // retorna o URI da requisição (caminho)
//            "inputs" => $request->input('descricao'),
//        ];
    }

    public function AtualizarProduto(ProdutoModel $prod){
        $produto = $prod;
        $repository = new ProdutoRepository();
        $repository->atualizarProduto($produto);
        $dados = true;
        $resultado = [
            "message" => $dados ? "Produto atualizado com Sucesso!" : "Não foi possivel realizar a operação!",
            "status" => $dados ? 200 : 500,
        ];
        return json_encode($resultado, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    public function ExcluirProduto($id){
        $repository = new ProdutoRepository();
        $res = $repository->excluirProduto($id);
        $resultado = [
            "status" => $res ? 200 : 500,
            "message" => $res ? "Produto deletado com sucesso!" : "Produto não encontrado!",
            "id" => $id
        ];

        return json_encode($resultado, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }
}
