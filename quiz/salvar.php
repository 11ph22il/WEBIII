<?php
  include_once "funcao.php";

  if (!checkAdmin())  {
    $erro = "Sem permissão para acessar a página, informe o login";
    include_once "login.php";
    exit(0);
  }


  $questao = array();
  $questao['id'] = $_POST['id'];
  $questao['pergunta'] = $_POST['pergunta'];
  $questao['opcao_a'] = $_POST['opcao_a'];
  $questao['opcao_b'] = $_POST['opcao_b'];
  $questao['opcao_c'] = $_POST['opcao_c'];
  $questao['resposta'] = $_POST['resposta'];
  $questao['categoria_id'] = $_POST['categoria_id'];
  //print_r($questao);
  if ($questao['id'] == 0) {
    salvarNovaQuestao($questao);
  } else {
    alterarQuestao($questao);
  }

  header("location: listagem.php");
  exit();

 ?>
