<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">


        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="CSS/style2.css">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

        <link rel="shortcut icon" href="IMG/favicon.png" type="image/x-icon" />
        <title>Arnold Cloths</title>
    </head>
    <body>
        <!--NavBar-->
        <nav class="navbar navbar-expand-lg fixed-top bg-primary-color position-relative" id="navbar">
            <div class="container py-3">
                <a href="index.php" class="navbar-brand primary-color">
                    <img src="IMG/favicon.png" alt="iHome">
                    <span>Arnold Clothes</span>
                </a>
                <button class="navbar-toggler" 
                type="button" 
                data-bs-toggle="collapse" 
                data-bs-target="#navbar-items" 
                aria-controls="navbar-items"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <i class="bi bi-list"></i>
            </button>
                <div class="collapse navbar-collapse" id="navbar-items">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link primary-color">Catálogo</a>
                        </li>
                        <li class="nav-item">
                            <a href="admin.php" class="nav-link active primary-color">
                                <i class="bi bi-person" id="login-icon"></i>
                                <span id="login-txt">Admin</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="ms-5 mt-3">
            <form method="post" action="./add.php" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="tamanho">Tamanho</label>
                        <input type="number" class="form-control" name="tamanho" id="tamanho" placeholder="12" required>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <label for="descricao">Descrição</label>
                    <input type="text" class="form-control" name="descricao" id="descricao" placeholder="Camisa azul com detalhes rosas" maxlength="50" required>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6 mt-3">
                        <label for="quantidade">Em Estoque</label>
                        <input type="number" class="form-control" name="quantidade" id="quantidade" required>
                    </div>
                    <div class="form-group col-md-2 mt-2">
                        <label for="preco">Valor</label>
                        <input type="number" class="form-control" name="preco" id="preco" step="0.01" required>
                    </div>
                    <div class="form-group col-md-4 mt-3">
                        <label for="imagem">Imagem</label>
                        <input type="file" class="form-control" accept="image/*" name="imagem" id="imagem">
                    </div>
                </div>
                <div class="form-group mb-3">
                    <div class="form-check mt-3">
                        <input class="form-check-input" type="checkbox" name="confirmar" id="confirmar">
                        <label class="form-check-label" for="confirmar">
                            Confirmo a adição
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-secondary" id="enviar">Adicionar</button>
            </form>
        </div>
        <div>
            <?php
                include("conection.php");
                if(isset($_POST) && !empty($_POST)){

                    $descricao = $_POST["descricao"];
                    $valor = $_POST["preco"];
                    $quantidade = $_POST["quantidade"];
                    $tamanho = $_POST["tamanho"];
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
                    // Check file size
                    if ($_FILES["imagem"]["size"] > 6000000) {
                        $uploadOk = 0;
                    }
                    
                    // Allow certain file formats
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

                    // criando a linha de INSERT
                    $sqlinsert = "insert into roupas (id, descricao, quantidade, precou, tamanho, img) values ('', '$descricao', '$quantidade', '$valor', '$tamanho', '$foto')";

                    // executando instrução SQL
                    $resultado = @mysqli_query($conexao, $sqlinsert);
                    if (!$resultado) {
                        ?>
                            <div class="alert alert-danger">
                                <p>Erro no Cadastro</p>
                            </div>
                        <?php
                    } else {
                        ?>
                            <div class="alert alert-success">
                                <p>Cadastro com Sucesso</p>
                            </div>
                        <?php
                    }
                }
            ?>
        </div>
    </body>
    <script src="JS/script.js"></script>
</html>