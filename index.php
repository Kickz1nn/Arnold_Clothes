<!DOCTYPE html>
<html lang="pt-BR">
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
        <nav class="navbar navbar-expand-lg fixed-top bg-primary-color" id="navbar">
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
                            <a href="#" class="nav-link active primary-color">Catálogo</a>
                        </li>
                        <li class="nav-item">
                            <a href="admin.php" class="nav-link primary-color">
                                <i class="bi bi-person" id="login-icon"></i>
                                <span id="login-txt">Admin</span>
                            </a>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container" id="featured-container">
            <div class="col-12">
                <h2 class="title primary-color">Roupas em Destaque</h2>
                <p class="subtitle secondary-color">Conheça nossas roupas mais comprada<abrr title="Carlos, o Fassa I">s</abbr></p>
                <div class="col-12" id="featured-images">                    
                    <?php
                        include("conection.php");
                        $sql = "SELECT * FROM roupas order by id";

                        $query = mysqli_query($conexao, $sql);

                        if (!$query) {
                            die("<h4>Query Inválida: " . @mysqli_error($conexao) . "</h4>\n");
                        }

                        $cont = 0;

                        escreverow();

                        while($dados = mysqli_fetch_array($query)) {

                            if($cont == 3) {
                                escreverow();
                            }

                            if (empty($dados['img'])) {
                                $descricao = $dados['descricao'];
                                $preco = $dados['precou'];
                                echo "\t\t\t\t\t\t<div class=\"col-12 col-md-4 mr-4 card\">\n";
                                echo "\t\t\t\t\t\t\t<img src=\"IMG/SemImagem.png\" class=\"img-fluid\">\n";
                                echo "\t\t\t\t\t\t\t<p class=\"card-text\">$descricao</p>";
                                echo "\t\t\t\t\t\t</div>\n";
                            } 
                            
                            else {
                                $imagem = $dados['img'];
                                $descricao = $dados['descricao'];
                                $preco = $dados['precou'];
                                echo "\t\t\t\t\t\t<div class=\"col-12 col-md-4 card\">\n";
                                echo "\t\t\t\t\t\t\t<img src=\"IMG/$imagem\" class=\"img-fluid card-body\" width=\"400px\" height=\"300px\">\n";
                                echo "\t\t\t\t\t\t\t<p class=\"card-text preco\"><b>R$ " . number_format($preco, 2, ",", ".") . "</b></p>";
                                echo "\t\t\t\t\t\t\t<p class=\"card-text desc\">$descricao</p>";
                                echo "\t\t\t\t\t\t</div>\n";
                            }

                            if($cont == 5) {
                                escrevefinal();
                                $cont = 0;
                            }

                            $cont++;
                        }

                        escrevefinal();

                        function escreverow() {
                            echo "<div class=\"row g-4\">\n";
                        }

                        function escrevefinal() {                            
                            echo "\t\t\t\t\t</div>\n";
                        }
                    ?>
                </div>
            </div>
        </div>
    </body>
