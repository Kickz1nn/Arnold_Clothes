<!DOCTYPE html>
<html lang="ptbr">
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
        <?php
            if(isset($_GET["mensagem"]) && !empty($_GET["mensagem"])) {
                ?>
                    <div class="alert alert-warning">
                        <?php echo $_GET["mensagem"]; ?>
                    </div>
                <?php
            }
?>
        <table class="table table-hover mt-5">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Imagem</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Em Estoque</th>
                    <th scope="col">Preço Unitário</th>
                    <th scope="col">Tamanho</th>
                    <th scope="col">Excluir</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include("conection.php");

                    $query = "SELECT id, descricao, quantidade, precou, tamanho, img from roupas";
                    $dados = mysqli_query($conexao, $query);          

                    if($dados) {
                        while($linha) {
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $linha["id"]?></th>
                                    <td><?php echo $linha["img"]?></td>
                                    <td><?php echo $linha["descricao"]?></td>
                                    <td><?php echo $linha["quantidade"]?></td>
                                    <td><?php echo "R$ " . number_format($linha["precou"],2,",","."); ?></td>
                                    <td><?php echo $linha["tamanho"]?></td>
                                    <td>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Excluir</>
                                    </td>
                                </tr>
                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Você deseja mesmo excluir?</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-footer">
                                                <a class="btn btn-danger" href="excluir.php?id=<?php echo $linha["id"]; ?>">Excluir</a>
                                                <a class="btn btn-warning" data-bs-dismiss="modal">Não Excluir</a>
                                            </div>
                                        </div>
            </div>
        </div>
                            <?php
                        }
                    }
                ?>
            </tbody>
        </table>
    </body>
</html>