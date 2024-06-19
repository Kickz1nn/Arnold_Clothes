<?php
    include("conection.php");

    $id = $_GET["id"];
    $quantidade = $_POST['quantidade'];
    $descricao = $_POST['descricao'];
    $precou = $_POST['precou'];
    $tamanho = $_POST['tamanho'];
    $imagens = "IMG/";
    $arquivo = $imagens . basename($_FILES["imagem"]["name"]);
    $uploadOk = 1;
    $tipoarquivo = strtolower(pathinfo($arquivo,PATHINFO_EXTENSION));
    $foto = "";

    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["imagem"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    
    if ($_FILES["imagem"]["size"] > 6000000) {
        $uploadOk = 0;
    }
    
    if($tipoarquivo != "jpg" && $tipoarquivo != "png" && $tipoarquivo != "jpeg") {
        $uploadOk = 0;
    }
    
    if ($uploadOk == 0) {
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $arquivo)) {
            $foto = basename($arquivo);
        } else {
            echo "Tivemos algum erro ao fazer o upload de sua imagem";
        }
    }

    $sqlupdate = "update roupas set quantidade=$quantidade, descricao=$descricao, precou =$precou, img = $foto, tamanho =$tamanho where id = $id ";

    $resultado = @mysqli_query($conexao, $sqlupdate);
    if (!$resultado) {
        echo '<input type="button" onclick="window.location=' . "'index.php'" . ';" value="Voltar"><br><br>';
        die('<b>Query Inválida:</b>' . @mysqli_error($conexao));
    } else {
        echo "<p>Produto Editado com Sucesso</p>";
    }
    mysqli_close($conexao);

    header("Location: ./qualedt.php?mensagem=Produto Editado com sucesso");
    exit();