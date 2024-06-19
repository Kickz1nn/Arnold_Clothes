<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="CSS/style2.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>

    <link rel="shortcut icon" href="IMG/flavicon.png" type="image/x-icon" />
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
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-items"
                aria-controls="navbar-items" aria-expanded="false" aria-label="Toggle navigation">
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
    <div class="m-4">
        <?php
            include ('conection.php');
            $idb = $_GET['idb'];
            $sqlconsulta = "select * from roupas where id = $idb";
            $resultado = @mysqli_query($conexao, $sqlconsulta);
            if (!$resultado) {
                echo '<input type="button" onclick="window.location=' . "'index.php'" . ';" value="Voltar"><br><br>';
                die('<b>Query Inválida:</b>' . @mysqli_error($conexao));
            } else {
                $num = @mysqli_num_rows($resultado);
                if ($num == 0) {
                    echo "<b>C�digo: </b>n�o localizado !!!!<br><br>";
                    echo '<input type="button" onclick="window.location=' . "'edtfinal.php'" . ';" value="Voltar"><br><br>';
                    exit;
                } else {
                    $dados = mysqli_fetch_array($resultado);
                }
            }
        ?>
        <form method="post" action="editar.php?id=<?php echo $dados["id"];?>" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="id">Id</label>
                    <input type="number" class="form-control" name="id" id="id" placeholder="" value='<?php echo $dados['id']; ?>'>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="tamanho">Tamanho</label>
                    <input type="number" class="form-control" name="tamanho" id="tamanho" placeholder=""
                        value='<?php echo $dados['tamanho']; ?>'>
                </div>
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" value='<?php echo $dados['descricao']; ?>' class="form-control" name="descricao"
                    id="descricao" placeholder="Camisa azul com detalhes rosas" maxlength="50">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="quantidade">Em Estoque</label>
                    <input type="number" class="form-control" value='<?php echo $dados['quantidade']; ?>'
                        name="quantidade" id="quantidade">
                </div>
                <div class="form-group col-md-2">
                    <label for="precou">Valor</label>
                    <input type="number" value='<?php echo $dados['precou']; ?>' class="form-control" name="precou"
                        id="precou" step="0.01">
                </div>
                <div class="form-group col-md-4">
                    <label for="imagem">Imagem</label>
                    <input type="file" class="form-control" name="imagem" id="imagem">
                </div>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="confirmar" id="confirmar">
                    <label class="form-check-label" for="confirmar">
                        Confirmo a alteração
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-secondary" id="enviar">Alterar</button>
        </form>
    </div>
</body>
<script src="JS/script.js"></script>

</html>