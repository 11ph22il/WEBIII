<?php
  include_once "funcao.php";

  if (!checkAdmin())  {
    $erro = "Sem permissão para acessar a página, informe o login";
    include_once "login.php";
    exit(0);
  }  

  $id = $_GET['id'];
  $questao = obterQuestaoById($id);

  include_once "formulario.php";
 ?>
