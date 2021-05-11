<?php

namespace Hcode\Model;

use \Hcode\DB\Sql;
use \Hcode\Model;

class Message extends Model {

	Const SESSION = "Texto";

	public static function listText()
	{
		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_texto");
	}

	public function saveM()
	{

	$sql = new Sql();

	$results = $sql->select("CALL sp_text_save (:idtexto, :destexto)", array(

	":idtexto"=>$this->getidtexto(),
	":destexto"=>$this->getdestexto()

	));

	$this->setData($results[0]);
	
	}
	

}
 





?>