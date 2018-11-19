<?php
	function CriaConexãoBd() : PDO
	{
		$bd = new PDO('mysql:host=localhost;dbname=maiscp2;charset=utf8', 'MaisCP2', 'administrador');

		$bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		return $bd;
	}
?>
