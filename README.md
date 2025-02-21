# teste-voch-tech

### Finalização do teste da Voch Tech!

# Gostaria de deixar algumas considerações sobre o desafio:

##Back-end:
### Desenvolvi a aplicação de forma separada, desenvolvendo o Back-end primeiramente que foi um grande sucesso, que é meu foco atualmente, no formato de API, para ficar mais simples a requisição de dados e tratativas e obtive sucesso neste ponto, e desenvolvi até um a mais na aplicação, pois achei que ficaria mais bacana e traria ainda mais valor para o desafio, mas já comento sobre, em relação as Features, desenvolvi todas com a capacidade de CRUD como foi solicitado pelo próprio teste, criei as rotas para todas as entidades da aplicação, inclusive, um pouco mais reduzido o escopo, mas, criei duas novas entidades, que seriam as Request e Product, são encontradas desta forma nos arquivos, que é responsável pela realização que posteriormente é pelas funcionalidades, relatórios e Auditoria, aonde trás para o usuário o que foi solicitado, por quem foi solicitado e aonde foi solicitado, tudo com horário da solicitação e ID da localidade, colaborador, e produto, e para ser especifica e um real caso de uso criei a entidade Product, para ser mais realista a situação, como caso de uso real. Sobre a funcionalidade autenticação, trabalhei no formato que prefiro, usando o Sanctum, para gerar meus Tokens, e validar a existência dos mesmo antes de permitir prosseguir com a solicitação, validando todos os endpoints da API.

##Front-end:
###Sobre a funcionalidade exportação, fico uma ressalva e a minha maior deficiência hoje, infelizmente não consegui finalizar o Front-end da forma que desejava, satisfatoriamente, então infelizmente, no teste só consegui finalizar o Back-end da aplicação, tentei trabalhar com o que foi recomendado usando o Livewire e usei outra biblioteca que comumente uso em meus projetos pessoais e trabalhos, o DataTables, porém tive diversos problemas com os mesmos, aonde não consegui fazer um funcionar com o outro, tentei de muitas formas, procurei por integrações das mesmas aqui no Github, procurei outras formas de fazer dar certo, mas infelizmente sem sucesso, e como tinha dito, exportação, o DataTables, permite eu realizar requisições, filtragem e pesquisa pelos dados que preenchem a tabela toda, e mais um plus, eu consigo baixar os dados filtrados da forma que estão sendo mostrados logo após realizar a pesquisa ou filtro, tanto em formato .xlsx(Excel), como .csv, .pdf e até impressão, se caso tenha alguma impressora disponível no momento, então seria está a opção de exportação que estava planejando como um segundo plus, para o teste, mas infelizmente sem sucesso algum quanto conseguir resultados satisfatórios com o Front-end.
###Link para projetos que fiz alguns anos atrás como ressalva, para caso tenha interesse: https://www.instagram.com/fernando.kuwahara?igsh=NDMyc2xsM3BycTlw

##Sobre o desafio:
###Gostaria de agradecer a oportunidade de trabalhar nele, foi satifatório por colocar em prática o que estudei e me dediquei a aprender, embora com algumas ressalva obviamente, mas, sou extremamente grato pela oportunidade de pode realizar o teste.

#Instalação:
###No projeto basicamente usei as seguite dependecias:
###- laravel 11
###- livewire
###- yajra/laravel-datatables
###- maatwebsite/excel
###- sanctum
###- innologica/laravel-vite
###- Bootstrap
##Comandos:
###- composer require laravel/laravel
###- composer require livewire/livewire
###- composer require yajra/laravel-datatables
###- php artisan install:api
###- composer require innologica/laravel-vite
###- composer require maatwebsite/excel
###- php artisan ui bootstrap --auth
###- npm i laravel-datatables-vite --save-dev
###- npm run build

#Configuração:
###Usei as configurações padrões que vem no .env, com a ressalva de preferir trabalhar e ser recomendado, usar o MySQL, só precisei alterar o DB_CONNECTION, e descomentar as linhas seguinte, todas por volta da linha 24 a 29:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=teste-voch-tech
DB_USERNAME=root
DB_PASSWORD=

#Endpoints:
###Criei todas estás rotas no arquivo api.php, e agrupei todas em suas respectivas necessidades, com validação utilizando o Sanctum, e inicializar a aplicação com o comando:
###- "php artisan serve"

##Obs: Para poder gerar o Token para testar os endpoints, basta acessar a rota "/", pois ela retorna um Token válido para enviar nas rotas e realizar as consultas.

##Exemplos e casos de rotas:
###Algumas rotas precisam de informações especificas para funcinar, sendo elas:

#Para todos os casos:
###Configuração do cabeçalho dos endpoints:

###- X-CSRF-TOKEN = <Token>
###- Content-Type = application/json

##Endpoints - exemplos - Register:
###- register(economic_group):
{
  "name": "Teste Grupo Economico 1"
}

###- register(flag)
{
  "name": "Teste criação bandeira 1"
}

###- register(unity)
{
  "fantasy-name": "Teste criação nome fantasia 1",
  "corporate-name": "Teste criação razão social 1",
  "cnpj": "20.374.904/5604-31"
}

###- register(collaborator)
{
  "name": "Teste Colaborador 1",
  "email": "teste1@teste1.com",
  "cpf": "123.456.789-59"
}

###- register(product)
{
  "name": "Teste Produto 1",
  "description": "Teste descrição produto 1"
}

###- register(request)
{
  "unitys_id": 1,
  "collaborators_id": 2,
  "products_id": 3
}

##Endpoints - exemplos - Update:

###Obs: Em alguns endpoints, é possível passar no corpo da requisição ou não, é um parâmetro opcional, um ID, que no caso seria um ID, que é a FK na tabela de destino, para representar o Item, atrelado.

###- update(economic_group):
{
  "name": "Teste Grupo Economico 1",
  "id": 1
}

###- update(flag): Aceita no corpo da requisição um ID (http://localhost:8000/flag/update/1)
{
  "name": "Teste criação bandeira 1",
  "id": 1
}

###- update(unity): Aceita no corpo da requisição um ID (http://localhost:8000/unity/update/1)
{
  "fantasy-name": "Teste criação nome fantasia 1",
  "corporate-name": "Teste criação razão social 1",
  "cnpj": "20.374.904/5604-31",
  "id": 1
}

###- update(collaborator): Aceita no corpo da requisição um ID (http://localhost:8000/collaborator/update/1)
{
  "name": "Teste Colaborador 1",
  "email": "teste1@teste1.com",
  "cpf": "123.456.789-59",
  "id": 1
}

###- update(product)
{
  "name": "Teste Produto 1",
  "description": "Teste descrição produto 1",
  "id": 1
}

###- update(request)
{
  "unitys_id": 1,
  "collaborators_id": 2,
  "products_id": 3,
  "id": 1
}

##Endpoints - exemplos - show e delete:
###Basicamente são os mais simples, show é apenas feito a requisição, mas ainda é passado do cabeçalho da requisição o Token.
###Delete, apenas é passado no corpo da requisição o id, do item que deseja excluir.

// Grupo de rotas para grupo economico
Route::prefix('economic_group')->group(function () {
    Route::get('show', [EconomicGroupController::class, 'show']);

    Route::post('register', [EconomicGroupController::class, 'register']);

    Route::delete('delete/{id}', [EconomicGroupController::class, 'delete']);

    Route::put('update', [EconomicGroupController::class, 'update']);
})->middleware('auth:sanctum');

// Grupo de rotas para bandeira
Route::prefix('flag')->group(function () {
    Route::get('show', [FlagController::class, 'show']);

    Route::post('register', [FlagController::class, 'register']);

    Route::delete('delete/{id}', [FlagController::class, 'delete']);

    Route::put('update/{id?}', [FlagController::class, 'update']);
})->middleware('auth:sanctum');

// Grupo de rotas para unidade
Route::prefix('unity')->group(function () {
    Route::get('show', [UnityController::class, 'show']);

    Route::post('register', [UnityController::class, 'register']);

    Route::delete('delete/{id}', [UnityController::class, 'delete']);

    Route::put('update/{id?}', [UnityController::class, 'update']);
})->middleware('auth:sanctum');

// Grupo de rotas para colaborador
Route::prefix('collaborator')->group(function () {
    Route::get('show', [CollaboratorController::class, 'show']);

    Route::post('register', [CollaboratorController::class, 'register']);

    Route::delete('delete/{id}', [CollaboratorController::class, 'delete']);

    Route::put('update/{id?}', [CollaboratorController::class, 'update']);
})->middleware('auth:sanctum');

// Grupo de rotas para produto
Route::prefix('product')->group(function () {
    Route::get('show', [ProductController::class, 'show']);

    Route::post('register', [ProductController::class, 'register']);

    Route::delete('delete/{id}', [ProductController::class, 'delete']);

    Route::put('update', [ProductController::class, 'update']);
})->middleware('auth:sanctum');

// Grupo de rotas para requisição
Route::prefix('request')->group(function () {
    Route::get('show', [RequestsController::class, 'show']);

    Route::post('register', [RequestsController::class, 'register']);

    Route::post('report', [RequestsController::class, 'reports']);

    Route::get('audit', [RequestsController::class, 'audit']);
})->middleware('auth:sanctum');















