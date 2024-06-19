<?php
    if(isset($_GET["id"]) && !empty($_GET)) {
        include("conection.php");
        
        $query = "delete from roupas where id = " . $_GET["id"];
        $resultado = mysqli_query($conexao, $query);

        if($resultado) {
            header("Location: ./lista.php?mensagem=Excluído com sucesso");
            exit();
        }else {
            header("Location: ./lista.php?mensagem=Selecione um produto para excluir");
            exit();
        }
    } else {
        header("Location: ./lista.php?mensagem=Selecione um produto para excluir");
        exit();
    }