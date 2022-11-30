### COMANDOS UTILIZADOS ###


# docker-compose run name_container bash -> to access the terminal of container (SSH)


# php artisan make:model Module -mc -> to create a model with params Migrate and Controller

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

Criando um Modulo que fará referencia a um curso

Um curso tem varios Modulos

mas um Modulo Só pertence a um curso neste caso temos o relacionamento 
One Course To Many Modules
One To Many

Passo a Passo criar o Model Module -mc // Migration e Controller
Usar A trait do Uuid e especificar os campos que serão preenchidos na model
implementar na controller o uso da repositary layer

no caso da relacao one to many, será usada a chave estranheira
na funcao index da controller sendo passada pelo parametro da url exemplo ObjetoA/{idObjetoA}/ObjetoB

Apos isso pode ser criado o Relacionamento nas Models.


Comandos para voltar um php artisan migrate em alguns passos pra nao ser necessarios usar o fresh<?php
php artisan migrate:rollback -step= (numero de passos em migrates q quer voltar)


Gerar fake data for Support Factory Of Tinker

Example:

\App\Models\Support::factory()->create(number total generates);

Criando Dez Suportes para um Usuario especifico e Aula Especifica

\App\Models\Support::factory()->count(10)->create([
    'user_id' => '203d63f5-b52f-4181-9467-2bf28d33b44a',
    'lesson_id' => '418d1a8e-e7f6-46bd-93fc-d71ea5cf0c7a'
]);


// ##################################################################### //
// ############################## FILTROS ############################## //
// ##################################################################### //





