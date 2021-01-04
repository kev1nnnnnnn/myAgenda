<?php

namespace Hcode;

use Rain\Tpl;

class Page {

	private $tpl; //vem de acordo com as rotas
	private $defaults = [
		"header"=>true, //habilitar layout
		"footer"=>true,
		"data"=>[]
	];

	public function __construct($opts = array(), $tpl_dir = "/views/") {

		//pega as duas, mescla e guarda dentro dos atributos
		$this->options = array_merge($this->defaults, $opts);

		// config
		$config = array(
			"tpl_dir"       => $_SERVER["DOCUMENT_ROOT"].$tpl_dir,
			"cache_dir"     => $_SERVER["DOCUMENT_ROOT"]."/views-cache/",
			"debug"			=> false
		   );

		Tpl::configure( $config );

		$this->tpl = new Tpl;

		//pega os dados faz chave e valor.
		//se tiver variavel titulo, o data pega o titulo e o valor do mesmo
		$this->setData($this->options["data"]);

		if ($this->options["header"] === true) $this->tpl->draw("header");
	}

	//método clear code
	//método clear code
	private function setData($data = array())
	{
	    foreach($data as $key => $value){
	        $this->tpl->assign($key, $value);
	    }
	}

	//metodo pro html do conteudo
	public function setTpl($name, $data = array(), $returnHTML = false) 
	{
		$this->setData($data);

		//desenha o tpl na tela
		return $this->tpl->draw($name, $returnHTML); //passa o nome do template e o retorno dele

	}

	public function __destruct() {

		//rodapé, e que repita nas paginas
		if($this->options["footer"] === true) $this->tpl->draw("footer");
	}


}

?>