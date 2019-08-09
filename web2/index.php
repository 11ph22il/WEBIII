<?php
  include_once "funcao.php";
  $clientes = obterClientes();
  $produtos = obterProdutos();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="estilo.css">
  </head>
  <body>
      <form action="gravar.php" method="post">
        <fieldset>
          <label>Cliente:
            <select name="cliente_id">
              <?php
                foreach ($clientes as $cliente) {
                  echo "<option value='{$cliente['id']}'>{$cliente['nome']}</option>";
                }
               ?>
            </select>
          </label>
          <label>Data: <input type="date" name="data"></label>
          <label>Documento: <input type="text" name="documento"></label>
        </fieldset>
        <fieldset>
          <label>Produto:
            <select name="produto_id" id="produto_id">
              <?php
                foreach ($produtos as $produto) {
                  echo "<option value='{$produto['id']}'>{$produto['descricao']}</option>";
                }
               ?>
            </select>
          </label>
          <label>Quantidade: <input type="number" name="quantidade" value="1" id="quantidade">
          </label>
          <button type="button" name="button" onclick=adiciona()>adiciona</button>
        </fieldset>
        <table>
          <thead>
            <tr>
              <th colspan="6">Itens da Venda</th>
            </tr>
            <tr>
              <th>ID-Prod.</th>
              <th>Produto</th>
              <th>Quantidade</th>
              <th>Vr.Unit.</th>
              <th>Vr.Total</th>
              <th></th>
            </tr>
          </thead>
          <tbody id="tbody-items">

          </tbody>
          <tfoot>
            <tr>
              <th colspan='4'>Total: </th>
              <th id="th-soma">R$ 0,00</th>
              <th></th>
            </tr>
          </tfoot>
        </table>
        <button type="submit" name="btnSalvar">Salvar</button>
      </form>
      <script type="text/javascript">
        var produtos;
        var soma = 0;
        fetch("obterProdutos.php").then(function(response) {
          return response.json().then(function(json) {
                produtos = json;
                console.log(produtos);
              });
        });

      </script>
      <script src="funcao.js"></script>
  </body>
</html>
