<?php 
session_start();
require_once("vendor/autoload.php");

use \Slim\Slim;
use \Hcode\Page;
use \Hcode\Model\User;
use \Hcode\Model\Message;

$app = new Slim();

$app->config('debug', true);


$app->get('/', function() {

	$users = User::listAll();

	$page = new Page();

	$page->setTpl("index", array(
		"users"=>$users
	)); 

});

$app->get('/agenda', function(){

$msg = Message::listText();

$page = new Page([
		"footer"=>false
	]);

$page->setTpl("agenda",array(
	"msg"=>$msg
	));
});

$app->post('/agenda', function() {

	$msg = new Message();

	$msg->setData($_POST);

	$msg->saveM();

	header("Location: /agenda");
	exit;

	

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

	$user = new User();

	$user->get((int)$iduser);

	$user->delete();

	header("Location: /");
	exit;

});

$app->get('/:iduser', function($iduser) {
	
	$user = new User();

	$user->get((int)$iduser);

	$page = new Page();

	$page->setTpl("update", array(
		"user"=>$user->getValues()
	));
});

$app->post('/create', function() {

	$user = new User();

	$_POST["inadmin"] = (isset($_POST["inadmin"]))?1:0;

	$user->setData($_POST);

	//executa o insert no banco
	$user->save();

	header("Location: /");
	exit;
	
});

$app->post('/:iduser', function($iduser){


	$user = new User();

	$user->get((int)$iduser);

	$user->setData($_POST);

	$user->update();

	header("Location: /");
	exit;
});



$app->run();

 ?>