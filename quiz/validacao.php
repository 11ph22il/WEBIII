<?php
  include_once "funcao.php";
  $email= $_POST["email"];
  $senha= $_POST["senha"];
  // echo "Usuário $email tem a senha $senha";
  $jogador = obterJogadorByEmail($email);
  $erro = "";
  if ($jogador) {
    // var_dump($jogador);
    if ($jogador["senha"] == $senha) {
      // setcookie("email", $email);
      session_start();
      $_SESSION["email"] = $email;
      header("location: index.php");
      // include_once "index.php";

      exit(0);
    } else {
      $erro = "senha inválida";
    }
  } else {
    $erro =  "Jogador não encontrado";
  }
  if ($erro != "") {
    include_once "login.php";
  }
 ?>
