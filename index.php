<?php 
session_start();
require_once("vendor/autoload.php");

use \Slim\Slim;
use \Hcode\Page;
use \Hcode\Model\User;

$app = new Slim();

$app->config('debug', true);


$app->get('/', function() {

	User::listAll();

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

	$page = new Page([
		"footer"=>false
	]);

	$page->setTpl("create");
});

$app->get('/:iduser/delete', function($iduser){

});

$app->get('/:iduser', function($iduser) {

	$page = new Page();

	$page->setTpl("update");
});

$app->post('/create', function() {

});

$app->post('/:iduser', function($iduser){

});



$app->run();

 ?>