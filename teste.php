mysql >GRANT ALL ON * [laravel] TO 'root'@'127.0.0.1' IDENTIFIED BY 'root';


GRANT ALL ON laravel.* TO 'root'@'127.0.0.1' IDENTIFIED BY 'root';

Instalacao do telescope ferramanta de debug para querys

composer require laravel/telescope
php artisan telescope:install

php artisan migrate -> para criar as tabelas 

Criar uma model ja com seu arquivo de migration

php artisan make:model Course -m


carlos@a79d63408023:/var/www$ php artisan make:resource CourseResource

carlos@a79d63408023:/var/www$ php artisan make:factory CourseFactory --model=Course


Passo a passa para recuperar um curso pelo seu ID 

1 - Criar um endpoint  no arquivo routes/api.php para show 
2 - Criar um metodo show na controller CourseController recebe id
3 - Na controller CourseController chamar o metodo findOrFail para recuperar o curso pelo id


Criando a camada de repository 


(isolar a logica de acesso a dados construção de querys complexas) 
**Evitar a responsabilidade de logica de negocio pela controller
**Limpeza da model e Controller


Criar dentro de app
app/Repositories
nomeRepository.php namespace
criar um metodo construtor para receber a model/entidade
declarar a model/entidade como atributo da classe nivel de acesso protected
fazer a importação da model e injeção de dependencia da model/entidade no construtor para capturar a model dentro do repository
this->ClassEntity = $model// recebida pelo construtor
**Controller passa a acessar o repository e nao a model/entidade**
Controller passa a ter um
constructor recebe a instancia do repository
Controller passará a retornar um resource agora de repository

**ANTES**
<?php 
function index()
{
    $courses = Course::get();
    
};
?>
**Depois**
<?php 
function index()
{
    return CourseResource::collection($this->repository->all());
};
?>








