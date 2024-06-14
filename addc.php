<?php
                include("conection.php");
                
                $codigo = $_POST["codigo"];
                $descricao = $_POST["descricao"];
                $valor = $_POST["precou"];
                $quantidade = $_POST["quantidade"];
                $tamanho = $_POST["tamanho"];
                $imgs = "";
                $imagens = "IMG/";
                $arquivo = $imagens . basename($_FILES["imgs"]["name"]);
                $uploadOk = 1;
                $tipoarquivo = strtolower(pathinfo($arquivo,PATHINFO_EXTENSION));
                               
                if(isset($_POST["submit"])) {
                    $check = getimagesize($_FILES["imgs"]["tmp_name"]);
                    if($check !== false) {
                        echo "File is an image - " . $check["mime"] . ".";
                    } else {
                        echo "File is not an image.";
                        $uploadOk = 0;
                    }
                }
                
                // Check if file already exists
                if (file_exists($arquivo)) {
                    echo "Sorry, file already exists.";
                    $uploadOk = 0;
                }
                
                // Check file size
                if ($_FILES["imgs"]["size"] > 6000000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }
                
                // Allow certain file formats
                if($tipoarquivo != "jpg" && $tipoarquivo != "png" && $tipoarquivo != "jpeg") {
                    echo "Sorry, only JPG, JPEG & PNG files are allowed.";
                    $uploadOk = 0;
                }
                
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                    // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["imgs"]["tmp_name"], $arquivo)) {
                        $foto = basename($arquivo);

                        echo "The file ". htmlspecialchars( basename( $_FILES["imgs"]["name"])). " has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }

                // criando a linha de INSERT
                $sqlinsert = "insert into roupas (id, descricao, quantidade, precou, tamanho, img) values ('$codigo', '$descricao', '$quantidade', '$valor', '$tamanho', '$foto')";

                // executando instrução SQL
                $resultado = @mysqli_query($conexao, $sqlinsert);
                if (!$resultado) {
                    echo "<input type='button' onclick='window.location=' . 'index.php' . ";" value='Voltar'><br><br>";
                    die("<b>Query Inválida:</b>" . @mysqli_error($conexao));
                } else {
                    echo "Registro Cadastrado com Sucesso";
                }
                mysqli_close($conexao);
	        ?>