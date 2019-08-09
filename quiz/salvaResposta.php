<?php
  include_once "funcao.php";
  session_start();
  if (!isset($_SESSION["email"])) {

  } else {
    $email = $_SESSION["email"];
    $jogador = obterJogadorByEmail($email);
  }
  $resposta = array();
  $resposta["jogador_id"] = $jogador["id"];
  $resposta["questao_id"] = $_POST["id"];
  $resposta["resposta"] = $_POST["resposta"];
  // var_dump($resposta);
  // exit(0);
  salvarResposta($resposta);
  header("location: index.php");
 ?>
