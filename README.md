# Lumen PHP Framework

[//]: # (metodo para criar um controller pelo terminal)
#### php artisan make:controller Home

[//]: # (Para usar alguns comandos de geradores no Lumen
 &#40;assim como você faz no Laravel&#41;, você precisa 
 adicionar este pacote:)

composer require flipbox/lumen-generator

[//]: # (Dentro do seu bootstrap/app.phparquivo, adicione:)
#### $ app->register( Flipbox \ LumenGenerator \LumenGeneratorServiceProvider::class);


php artisan make:migration create_users_table
php artisan migrate
php artisan migrate:fresh
