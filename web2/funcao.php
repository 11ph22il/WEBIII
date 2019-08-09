<?php
  function obterConexao() {
    $conexao = mysqli_connect("localhost", "root", "", "web220191");
    mysqli_set_charset($conexao, 'utf8');
    return $conexao;
  }


  function obterClientes() {
    $conexao = obterConexao();
    $resultado = mysqli_query($conexao,
            "SELECT * from cliente order by nome ");
    $clientes = array();
    if ($resultado) {
      $clientes = mysqli_fetch_all($resultado,
          MYSQLI_ASSOC);
    }
    mysqli_free_result($resultado);
    mysqli_close($conexao);
    return $clientes;
  }

  function obterProdutos() {
    $conexao = obterConexao();
    $resultado = mysqli_query($conexao,
            "SELECT * from produto order by descricao ");
    $produtos = array();
    if ($resultado) {
      $produtos = mysqli_fetch_all($resultado,
          MYSQLI_ASSOC);
    }
    mysqli_free_result($resultado);
    mysqli_close($conexao);
    return $produtos;
  }

  function obterProduto($id) {
    $conexao = obterConexao();
    $sql = "select * from produto where id=?";
    $sentenca = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($sentenca, "i", $id);
    mysqli_stmt_execute($sentenca);
    $resultado = mysqli_stmt_get_result($sentenca);
    $produto = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
    mysqli_free_result($resultado);
    mysqli_close($conexao);
    return $produto;
  }

//salvar($venda, $vetor_produto, $vetor_quantidade);
  function salvar($venda, $vetor_produto, $vetor_quantidade) {
    $venda['total'] = 0;
    $vetor_vr_unit = array();
    $i = 0;
    foreach ($vetor_produto as $produto_id) {
      $produto = obterProduto($produto_id);
      $vetor_vr_unit[] = $produto['valor_unitario'];
      $venda['total'] += $produto['valor_unitario'] *
        $vetor_quantidade[$i];
      $i++;
    }

    $conexao = obterConexao();
    $sql = "insert into venda (cliente_id, data, documento, total) values (?, ?, ?, ?)";
    $sentenca = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($sentenca, "issd", $venda["cliente_id"],
                $venda["data"], $venda["documento"], $venda["total"]);
    mysqli_stmt_execute($sentenca);
    $venda_id = mysqli_insert_id($conexao);

    for($i=0;$i<sizeof($vetor_produto);$i++ ) {
      $sql = "insert into item_venda (venda_id, produto_id, quantidade, valor_unitario, valor_total) values (?, ?, ?, ?, ?) ";
      $sentenca1 = mysqli_prepare($conexao, $sql);
      $valor_total = $vetor_quantidade[$i] * $vetor_vr_unit[$i];
      mysqli_stmt_bind_param($sentenca1, "iiidd", $venda_id, $vetor_produto[$i], $vetor_quantidade[$i], $vetor_vr_unit[$i], $valor_total);
      mysqli_stmt_execute($sentenca1);
    }
    mysqli_close($conexao);
  }
 ?>
