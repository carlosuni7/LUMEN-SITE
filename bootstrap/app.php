<?php

require_once __DIR__.'/../vendor/autoload.php';

(new Laravel\Lumen\Bootstrap\LoadEnvironmentVariables(
    dirname(__DIR__)
))->bootstrap();

date_default_timezone_set(env('APP_TIMEZONE', 'UTC'));



/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| Aqui, carregaremos o ambiente e criaremos a instância da aplicação
| que serve como a peça central deste framework. Usaremos esta
| aplicação como um contêiner de IoC e roteador para este framework.
|
*/

$app = new Laravel\Lumen\Application(
    dirname(__DIR__)
);

$app->withFacades();

$app->withEloquent();

/*
|--------------------------------------------------------------------------
| Register Container Bindings
|--------------------------------------------------------------------------
|
| Agora, vamos registrar algumas vinculações no contêiner de serviços. Vamos
| registrar o manipulador de exceções e o kernel do console. Você pode adicionar
| suas próprias vinculações aqui, se desejar, ou criar um arquivo separado.
|
*/

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

/*
|--------------------------------------------------------------------------
| Register Config Files
|--------------------------------------------------------------------------
|
| Agora, vamos registrar o arquivo de configuração do "app". Se o arquivo existir no
| seu diretório de configuração, ele será carregado; caso contrário, carregaremos
| a versão padrão. Você pode registrar outros arquivos abaixo, conforme necessário.
|
*/

$app->configure('app');

/*
|--------------------------------------------------------------------------
| Register Middleware
|--------------------------------------------------------------------------
|
| Em seguida, registraremos o middleware na aplicação. Eles podem
| ser middlewares globais, executados antes e depois de cada requisição a uma
| rota, ou middlewares atribuídos a rotas específicas.
|
*/

// $app->middleware([
//     App\Http\Middleware\ExampleMiddleware::class
// ]);

// $app->routeMiddleware([
//     'auth' => App\Http\Middleware\Authenticate::class,
// ]);

/*
|--------------------------------------------------------------------------
| Register Service Providers
|--------------------------------------------------------------------------
|
| Here we will register all of the application's service providers which
| are used to bind services into the container. Service providers are
| totally optional, so you are not required to uncomment this line.
|
*/

$app->register(Flipbox\LumenGenerator\LumenGeneratorServiceProvider::class);
// $app->register(App\Providers\AppServiceProvider::class);
// $app->register(App\Providers\AuthServiceProvider::class);
// $app->register(App\Providers\EventServiceProvider::class);


/*
|--------------------------------------------------------------------------
| Load The Application Routes
|--------------------------------------------------------------------------
|
| Next we will include the routes file so that they can all be added to
| the application. This will provide all of the URLs the application
| can respond to, as well as the controllers that may handle them.
|
*/

$app->router->group([
    'namespace' => 'App\Http\Controllers',
], function ($router) {
    require __DIR__.'/../routes/web.php';
});

return $app;
