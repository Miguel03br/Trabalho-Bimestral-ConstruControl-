<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>ConstruControl</title>
</head>



<body>
    <form action="" method="POST">
        <h2>Seja bem vindo ADM!</h2>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Adicionar
        </button>


        <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">Side Bar</button>

        <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
            <div class="offcanvas-header">
                <h2 class="offcanvas-title" id="offcanvasScrollingLabel">kk iae man</h2>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <a href="">Conta</a>
                <a href="./criarConta/sairConta.php">Sair da conta</a>
                <a href="">Funcionários</a>
            </div>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Adicionar construção</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <p>Nome da construção:</p>
                        <input type="text" class="form-control" name="nomeConstrucaoChefe" id="floatingInput">
                        <label for="floatingInput"></label>

                        <p>Data final da construção:</p>
                        <input type="text" class="form-control" name="dataFinalChefe" id="floatingInput">
                        <label for="floatingInput"></label>

                        <p>Andamento da obra:</p>
                        <div class="input-group mb-3">
                            <select class="form-select" id="inputGroupSelect01" name="processoAndamentoChefe">
                                <option value="1">Será iniciada</option>
                                <option value="2">Em construção</option>
                                <option value="3">Concluída</option>
                            </select>
                        </div>

                        <p>Solicitações:</p>
                        <input type="text" class="form-control" name="solicitacaoChefe" id="floatingInput">
                        <label for="floatingInput"></label>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" name="AddProjChefe" class="btn btn-primary">Adicionar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

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
    if (isset($_POST["nomeConstrucaoChefe"]) && isset($_POST["dataFinalChefe"]) && isset($_POST["processoAndamentoChefe"]) && isset($_POST["solicitacaoChefe"]) && !empty(trim($_POST["nomeConstrucaoChefe"])) && !empty(trim($_POST["dataFinalChefe"])) && !empty(trim($_POST["processoAndamentoChefe"]))) {
        require "01_conexao.php";
        $nomeConstrucaoChefe = $_POST["nomeConstrucaoChefe"];
        $dataFinalChefe = $_POST["dataFinalChefe"];
        $processoAndamentoChefe = $_POST["processoAndamentoChefe"];
        $solicitacaoChefe = $_POST["solicitacaoChefe"];
        $sql = "INSERT INTO tabelas_chefe(nome_construcao_chefe, data_final_chefe, processo_andamento_chefe, solicitao_chefe) VALUES(:nome_construcao_chefe, :data_final_chefe, :processo_andamento_chefe, :solicitao_chefe)";
        $resultado = $conn->prepare($sql);
        $resultado->bindValue(":nome_construcao_chefe", $nomeConstrucaoChefe);
        $resultado->bindValue(":data_final_chefe", $dataFinalChefe);
        $resultado->bindValue(":processo_andamento_chefe", $processoAndamentoChefe);
        $resultado->bindValue(":solicitao_chefe", $solicitaoChefe);
        $resultado->execute();

        header ("07_adicionarConstrucaoChefe.php");
    }
    ?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>
