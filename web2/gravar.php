<?php
  include_once "funcao.php";

  $venda = array();
  $venda['cliente_id'] = $_POST['cliente_id'];
  $venda['data'] = $_POST['data'];
  $venda['documento'] = $_POST['documento'];

  $vetor_produto = $_POST['produto_id'];
  $vetor_quantidade = $_POST['quant'];

  salvar($venda, $vetor_produto, $vetor_quantidade);

  header("location: index.php");
  exit();
 ?>
