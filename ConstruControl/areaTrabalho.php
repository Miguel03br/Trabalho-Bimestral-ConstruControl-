<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="node_modules/parsleyjs/src/parsley.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>ConstruControl</title>
</head>



<body>
    <form action="" method="POST">
        <h2>Registre suas construções e projetos aqui</h2>
        <button type="button" name="AddProj" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Adicionar
        </button>

        <?php
        if (isset($_GET["erro"])) {
            echo "
            <div class='alert alert-danger' role='alert'>
                Este projeto já existe, por favor, tente inserir um ainda não criado
            </div>
            ";
        }elseif(isset($_GET["erro2"])){
            echo "
            <div class='alert alert-danger' role='alert'>
                Já existe um projeto com este nome, tente criar algum com outro nome!
            </div>
            ";
        }elseif(isset($_POST["sucesso"])){
            echo "
            <div class='alert alert-success' role='alert'>
                Projeto adicionado com sucesso!
            </div>
            ";
        }
        ?>

        <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">Side Bar</button>

        <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
            <div class="offcanvas-header">
                <h2 class="offcanvas-title" id="offcanvasScrollingLabel">Bem vindo(a)</h2>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <a href="">Conta</a>
                <a href="./criarConta/sairConta.php">Sair da conta</a>
            </div>
        </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Data Final</th>
                <th scope="col">Andamento</th>
                <th scope="col">Solicitações</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="row">Prédio</td>
                <td>13/08</td>
                <td>Em construção</td>
                <td>Gostaria de mais tempo para finalizar a obra</td>
            </tr>
            <tr>
                <td scope="row">Casa</td>
                <td>09/08</td>
                <td>Para começar</td>
                <td>Solicitamos mais tempo para concluirmos o prédio para o dia 13</td>
            </tr>
            <tr>
                <td scope="row">Ponte</td>
                <td>06/10</td>
                <td>Concluída</td>
                <td></td>
            </tr>
        </tbody>
    </table>

    <?php
        if(isset($_POST["AddProj"])){
            header("location: adicionarConstrucao.php");
        }
    ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="node_modules/parsleyjs/dist/parsley.min.js"></script>
<script src="node_modules/parsleyjs/dist/i18n/pt-br.js"></script>

</html>