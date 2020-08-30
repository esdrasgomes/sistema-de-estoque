<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Produtos Cadastrados</title>
		<script src="https://kit.fontawesome.com/327cdc9af2.js" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	</head>
	<body>
	<?php

	session_start();

	$usuario = $_SESSION['usuario'];

	if(!isset($_SESSION['usuario'])) {
		header('Location: index.php');
	}

	?>

		<div class="container" style="margin-top: 40px">
			<div style="text-align: right;">
				<a href="main.php" role="button" class="btn btn-info btn-sm" style="font-weight: bold;">Voltar!</a>
			</div>
			<h3>Produtos Cadastrados</h3>
			<br>
			<table class="table table-hover">
			  	<thead>
				    <tr>
				    	<th scope="col">Código</th>
					    <th scope="col">Descrição</th>
						<th scope="col">Quantidade</th>
						<th scope="col">Preço unit.</th>
						<th scope="col">Preço total</th>
						<th scope="col">Categoria</th>
						<th scope="col">Fornecedor</th>
						<th scope="col">Ação</th>
				    </tr>
			  	</thead>
			    	<!-- Buscando informações do banco de dados para inserir na tabela -->
			    	<?php

			    		include 'conexao.php';
			    		$sql = "SELECT * FROM `estoque`";
						$busca = mysqli_query($conexao,$sql);
						

			    		while ($array = mysqli_fetch_array($busca)) {

			    			$id_estoque = $array['id_estoque'];
			    			$nroproduto = $array['nroproduto'];
			    			$nomeproduto = $array['nomeproduto'];
							$quantidade = $array['quantidade'];
							$preco = $array['preco'];
							$precototal = $quantidade * $preco;
							$categoria = $array['categoria'];
							$fornecedor = $array['fornecedor'];

			    	?>
					
			    	<tr>
				      	<td><?php echo $nroproduto ?></td>
				      	<td><?php echo $nomeproduto ?></td>
				      	<td><?php echo $quantidade ?></td>
						<td>R$ <?php echo number_format($preco, 2, ',','.'); ?></td>
						<td>R$ <?php echo number_format($precototal, 2, ',','.'); ?></td>
						<td><?php echo $categoria ?></td>
				      	<td><?php echo $fornecedor ?></td>
				      	<td>
				      		<a class="btn btn-success btn-sm" href="editar_produto.php?id=<?php echo $id_estoque ?>" role="button"><i class="far fa-edit"></i>&nbsp;Editar</a>

				      		<a class="btn btn-danger btn-sm" href="excluir_produto.php?id=<?php echo $id_estoque ?>" role="button"><i class="fas fa-trash-alt"></i></i>&nbsp;Excluir</a>

						

				      	</td>
							<?php } ?>
			    	</tr>
							
			</table>

		</div>







		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	</body>
</html>