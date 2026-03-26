<?php
    require "conexao.php";

    if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['cadastrar_produto'])){
        $nome = $_POST["nomeProduto"];
        $descricao = $_POST["descricaoProduto"];
        $categoria = $_POST["categoriaProduto"];
        $preco = $_POST['precoProduto'];
        $quantidade = $_POST['quantidadeProduto'];
        
        // Pasta onde a imagem será salva dentro do container
        $diretorio_destino_imagem = 'src/images/uploads/';

        // Verifica se o arquivo foi enviado sem erros
        if(isset($_FILES['imagemProduto']) && $_FILES['imagemProduto']['error'] === UPLOAD_ERR_OK){
            
            $nome_original = $_FILES['imagemProduto']['name'];
            
            // Remove espaços para não quebrar o link no navegador
            $nome_limpo = str_replace(' ', '_', $nome_original);
            $novo_nome = uniqid() . '_' . $nome_limpo;

            $caminho_completo = $diretorio_destino_imagem . $novo_nome;

            // move_uploaded_file: tira da pasta temporária e põe na pasta do projeto
            if(move_uploaded_file($_FILES['imagemProduto']['tmp_name'], $caminho_completo)){
                try{    
                    $stmt = $pdo->prepare("INSERT INTO PRODUTO (nm_produto, ds_produto, nm_categoria, caminho_imagem, vl_produto, qt_estoque_produto) VALUES (:nm, :descr, :cat, :img, :prc, :qtd)");

                    $stmt->execute([
                        ':nm' => $nome,
                        ':descr' => $descricao,
                        ':cat' => $categoria,
                        ':img' => $caminho_completo,
                        ':prc' => $preco,
                        ':qtd' => $quantidade
                    ]);

                    echo "<script>
                            alert('Produto cadastrado com sucesso!');
                            window.location.href = 'cadastro_produtos.php';
                        </script>";
                }catch(PDOException $e){
                    echo "Erro ao salvar no banco: " . $e->getMessage();
                }
            } else {
                echo "Erro: O PHP não conseguiu mover o arquivo. Tente rodar: sudo chmod -R 777 src/images/uploads/";
            }
        } else {
            echo "Erro no upload: Verifique se o arquivo não é muito grande.";
        }
    }
?>