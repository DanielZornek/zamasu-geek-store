<?php
	require "conexao.php";

	if($_SERVER["REQUEST_METHOD"] === "POST"){
		$nome = $_POST["nomeProduto"];
		$descricao = $_POST["descricaoProduto"];
		$categoria = $_POST["categoriaProduto"];
		$preco = $_POST['precoProduto'];
		$quantidade = $_POST['quantidadeProduto'];
		$diretorio_destino_imagem = 'src/images/uploads/';

		if(isset($_FILES['imagemProduto']) && !empty($_FILES['imagemProduto']['name'])){
		    
		    $nome_arquivo = $_FILES['imagemProduto']['name'];

		    $novo_nome = uniqid() . '_' . $nome_arquivo;

		    $caminho_completo = $diretorio_destino_imagem . $novo_nome;

		    if(move_uploaded_file($_FILES['imagemProduto']['tmp_name'], $caminho_completo)){
		        echo "Arquivo enviado com sucesso!";
		    } else {
		        echo "Erro ao enviar o arquivo.";
		    }
		} else {
		    echo "Nenhum arquivo selecionado.";
		}

		try{	
			$stmt = $pdo->prepare("INSERT INTO PRODUTO ( nm_produto, ds_produto, nm_categoria, caminho_imagem, vl_produto, qt_estoque_produto) VALUES (:nm, :descr, :cat, :img, :prc, :qtd)");

			$stmt->bindParam(':nm', $nome);
			$stmt->bindParam(':descr', $descricao);
			$stmt->bindParam(':cat', $categoria);
			$stmt->bindParam(':img', $caminho_completo);
			$stmt->bindParam(':prc', $preco);
			$stmt->bindParam(':qtd', $quantidade);

			$stmt->execute();

			echo "<script>
					alert('produto cadastrado');
					window.location.href = 'cadastro_produtos.php';
				</script>";
		}catch(PDOExecption $e){
			echo "Erro ao cadastrar produto: <br>" . $e->getMessage();
		}
	}
?>