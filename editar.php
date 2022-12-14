<?php
    require_once "config.php";
    $id = $_GET['id'];
    global $db;
    $informacoes = array();

    $sql = "SELECT * FROM usuarios WHERE id = :id";
    $sql = $db->prepare($sql);
    $sql->bindValue(":id", $id);
    $sql->execute();

    if ($sql->rowCount() > 0) {
        $informacoes = $sql->fetch();
    }else{
        echo "<h1> Usuario nao encontrado</h1>";
        exit;
    }



    if ($_POST) {
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];
        $sql = "UPDATE usuarios SET id = :id, nome = :nome, sobrenome = :sobrenome, usuario = :usuario, senha = :senha , data_criacao = NOW()";
        $sql = $db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":sobrenome", $sobrenome);
        $sql->bindValue(":usuario", $usuario);
        $sql->bindValue(":senha", $senha);
        $sql->execute();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">  
        <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>    
    <title>Editar</title>
</head>
<body>
    <div class="container fundo">
        <div class="fundo-menu">



            <a href="novo-usuario.php" class="botao-menu">  
                <img class="icone" src="./imagens/mais.png"/>
                <div class="botao-menu"></div>
            </a>



            <a href="busca.php" class="botao-menu" > 
                <img class="icone" src="./imagens/pesquisa.png" alt=""/>
                <div class="botao-menu" ></div>
            </a>



            <a href="registros.php" class="botao-menu" >
                <img class="icone" src="./imagens/1333544.png"/>
                <div class="botao-menu"></div>
            </a>
        </div>



        <div class="fundo-conteudo">           
            
            <div class="container">
                <fieldset>
                    <legend> Editar Usuario </legend>
                    <form method="POST">
                            <label>Nome</label >
                            <input type="text" class="form-control" name="nome" value="<?php echo $informacoes ['nome'] ?>" autofocus/>

                            <label>Sobrenome</label>
                            <input type="text" class="form-control" name="sobrenome" value="<?php echo $informacoes ['sobrenome'] ?>"/>

                            <label>Usu??rio</label>
                            <input type="text" class="form-control" name="usuario" value="<?php echo $informacoes ['usuario'] ?>"/>

                            <label>Senha</label>
                            <input type="password" class="form-control" name="senha" value="<?php echo $informacoes ['senha'] ?>"/>

                            <br/><a href="registros.php" class="btn btn-warning"> Voltar </a>  
                            <button type="submit" class="btn btn-success">Salvar</button>  
                    </form>
                </fieldset>
            </div> 

        </div>
    </div>   
</body>
</html>