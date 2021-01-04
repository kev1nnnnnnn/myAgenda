<?php 
session_start();
require_once("vendor/autoload.php");

use \Slim\Slim;
use \Hcode\Page;
use \Hcode\Model\User;

$app = new Slim();

$app->config('debug', true);


$app->get('/', function() {

	$users = User::listAll();

	$page = new Page();

	$page->setTpl("index", array(
		"users"=>$users
	)); 

});

$app->get('/login', function(){

	$page = new Page();

	$page->setTpl("login");
});

$app->post('/login', function() {
	
	User::login($_POST['login'], $_POST['password']);

	header("Location: /");
	exit;
});

$app->get('/logout', function() {
	
	User::logout();
	
	header("Location: /login");
	exit;
});

$app->get('/create', function() {

	User::verifyLogin();

	$page = new Page([
		"footer"=>false
	]);

	$page->setTpl("create");
});

$app->get('/:iduser/delete', function($iduser){

	User::verifyLogin();

	$user = new User();

	$user->get((int)$iduser);

	$user->delete();

	header("Location: /");
	exit;

});

$app->get('/:iduser', function($iduser) {

	User::verifyLogin();
	
	$user = new User();

	$user->get((int)$iduser);

	$page = new Page();

	$page->setTpl("update", array(
		"user"=>$user->getValues()
	));
});

$app->post('/create', function() {
	
	User::verifyLogin();

	$user = new User();

	$_POST["inadmin"] = (isset($_POST["inadmin"]))?1:0;

	$user->setData($_POST);

	//executa o insert no banco
	$user->save();

	header("Location: /");
	exit;
	
});

$app->post('/:iduser', function($iduser){
	
	User::verifyLogin();

	$user = new User();

	$user->get((int)$iduser);

	$user->setData($_POST);

	$user->update();

	header("Location: /");
	exit;
});



$app->run();

 ?>