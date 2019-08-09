<?php
  include_once "funcao.php";

  if (!checkAdmin())  {
    $erro = "Sem permissão para acessar a página, informe o login";
    include_once "login.php";
    exit(0);
  }

  if (!isset($questao)) {
    $questao = array();
    $questao['id'] = 0;
    $questao['pergunta'] = "";
    $questao['opcao_a'] = "";
    $questao['opcao_b'] = "";
    $questao['opcao_c'] = "";
    $questao['resposta'] = "";
    $questao['categoria_id'] = 0;
  }
  $categorias = obterCategorias();

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <div class="container">
        <h1>Formulário de Pergunta</h1>
        <form action="salvar.php" method="post">
          <div class="form-group">
            <label for="id">ID</label>
            <input readonly type="text" class="form-control" id="id" name="id" value="<?php echo $questao['id'] ?>">
          </div>
          <div class="form-group">
            <label for="id">ID</label>
            <select name="categoria_id">
              <?php
                foreach ($categorias as $categoria) {
                  $selecione = ($categoria["id"] == $questao["categoria_id"]) ? "selected" : "";
                  echo "<option value='{$categoria['id']}' {$selecione}>{$categoria['descricao']}</option>";
                }
               ?>
            </select>
          </div>

          <div class="form-group">
            <label for="pergunta">Pergunta</label>
            <input type="text" class="form-control" id="pergunta" placeholder="Informe a pergunta" name="pergunta" value="<?php echo $questao['pergunta'] ?>">
          </div>
          <div class="form-group">
            <label for="opcao_a">Primeira Opção</label>
            <input type="text" class="form-control" id="opcao_a" placeholder="Informe a primeira opção" name="opcao_a"  value="<?php echo $questao['opcao_a'] ?>">
          </div>
          <div class="form-group">
            <label for="opcao_b">Segunda Opção</label>
            <input type="text" class="form-control" id="opcao_b" placeholder="Informe a segunda opção" name="opcao_b"  value="<?php echo $questao['opcao_b'] ?>">
          </div>
          <div class="form-group">
            <label for="opcao_c">Terceira Opção</label>
            <input type="text" class="form-control" id="opcao_c" placeholder="Informe a terceira opção" name="opcao_c"  value="<?php echo $questao['opcao_c'] ?>">
          </div>
          <div class="form-group">
            <label for="resposta">Resposta Certa</label>
            <input type="text" class="form-control" id="resposta" placeholder="Informe a resposta certa" name="resposta"  value="<?php echo $questao['resposta'] ?>">
          </div>
          <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
      </div>
  </body>
</html>
