<?php
	include_once("funcao.php");
	$professores = obterProfessores();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="estilo.css">
	<title>Professores</title>
</head>
<body>
	<h1>Lista de Professores do Curso Sistemas para Internet</h1>
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Nome</th>
				<th>Área</th>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach($professores as $professor){
					echo "
						<tr>
							<td>{$professor['id']}</td>
							<td>{$professor['nome']}</td>
							<td>{$professor['area']}</td>
						</tr>
					";
				}
			?>
		</tbody>
	</table>
</body>
</html>