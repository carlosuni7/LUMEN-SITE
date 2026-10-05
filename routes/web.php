<?php

/** @var \Laravel\Lumen\Routing\Router $router */

//$router (O Recepcionista): Ele é o chefe da entrada.
// Fica o tempo todo esperando os clientes (os visitantes do seu site)
// chegarem e é ele quem decide para que mesa ou setor cada pessoa deve ir

//$router->get('/', function () use ($router) {
//    return "Helo world!";
//});

$router->get('/', 'Home@index');

$router->get('/produtos', 'ProdutoController@index');
$router->get('/produtos/all', 'ProdutoController@ListarTodosProdutos');
$router->get('/produtos/', 'ProdutoController@ListarProduto');

$router->post('/produto/cadastrar', 'ProdutoController@CadastrarProduto');


$router->patch('/produtos/{id}', 'ProdutoController@AtualizarProduto');
$router->delete('/produtos/excluir/{id}', 'ProdutoController@ExcluirProduto');

// $router->get('user/{id}', [
//     'as'   => 'profile',
//     'uses' => 'UserController@showProfile'
// ]);
$router->get('/categorias', function () {
    $categorias = [
        [
            'id' => 1,
            'nome' => 'Eletrônicos',
            'descricao' => 'Smartphones, tablets e dispositivos eletrônicos portáteis.',
            'ativo' => true
        ],
        [
            'id' => 2,
            'nome' => 'Informática',
            'descricao' => 'Computadores, notebooks, peças e hardware em geral.',
            'ativo' => true
        ],
        [
            'id' => 3,
            'nome' => 'Acessórios',
            'descricao' => 'Cabos, capas, carregadores e fones de ouvido.',
            'ativo' => true
        ],
        [
            'id' => 4,
            'nome' => 'Casa Inteligente',
            'descricao' => 'Lâmpadas smart, assistentes virtuais e automação residencial.',
            'ativo' => false
        ],
        [
            'id' => 5,
            'nome' => 'Periféricos',
            'descricao' => 'Teclados, mouses, monitores e impressoras.',
            'ativo' => true
        ]
    ]; // Armazena um cojunto de dados array

    $reponse = [
        "status" => 200,
        "messsage" => "OK",
        "data" => $categorias,
    ];

    return json_encode($reponse, JSON_FORCE_OBJECT | JSON_UNESCAPED_UNICODE);
});



$router->get('/produtos/{id}/categoria/{categoria}', function($id, $categoria = null){
    $response = [
        [
            'id' => $id ? $id : null,
            'categoria' => $categoria ? $categoria : "Sem categoria",
        ]
    ];

    return json_encode($response, JSON_PRETTY_PRINT);
});

//$router->get('/produtos', 'ProdutoController@showProdutos');
$router->get('user/{name:[A-Za-z]+}', function ($name) {
    return [
        ['nome' => $name],
    ];
});

$router->get('profile', ['as' => 'profile', function () {
    //
}]);

// Gera a URL exata da rota nomeada (ex: "http://localhost:8000/profile"):
$url = route('profile');

// Redireciona o usuário para essa rota específica:
//return redirect()->route('profile');
