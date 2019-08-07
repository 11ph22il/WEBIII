<?php

	function obterConexao(){
		$conexao = NULL;
		try{
			$conexao = new PDO('mysql:host=localhost;dbname=web3','root','');
			echo 'conectou';
		}
		catch (PDOException $e){
			echo 'Erro ao conectar com o MySQL:' . $e->getMessage();
		}
		return $conexao; 
	}

	function obterProfessores(){
		$conexao = obterConexao();
		$sentenca = $conexao->query("select * from professor order by nome");
		$professores = $sentenca->fetchAll(PDO::FETCH_ASSOC);

		return $professores;
	}
