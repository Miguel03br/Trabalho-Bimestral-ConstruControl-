<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="node_modules/parsleyjs/src/parsley.css">
    <title>ConstruControl</title>
</head>
<body>
<section id="secao">
        <div id="formulario">
            <div id="divFormulario" class="">
                <form data-parsley-validate id="form" class="mb-3" action="" method="POST"> 

                    <h2>Adicionar construção</h2> 

                    <div class="form-floating mt-3">
                        <p>Nome: <span style="color: red">*</span></p>
                        <input type="email" class="form-control" name="nomeConstrucaoChefe" id="InputEmail" required>
                    </div>

                    <div class="form-floating mt-3">
                        <p>Data Final: <span style="color: red">*</span></p>
                        <input type="password" class="form-control" name="dataFinalChefe" id="InputSenha" required>
                    </div>

                    <div class="input-group">
                        <p>Andamento: <span style="color: red">*</span></p>
                        <select class="form-select" name="processoAndamentoChefe" id="inputGroupSelect04" aria-label="Example select with button addon">
                            <option value="1">Será iniciada</option>
                            <option value="2">Em andamento</option>
                            <option value="3">Concluída</option>
                        </select>
                    </div>

                    <div class="form-floating mt-3">
                        <p>Solicitações (opcional):</p>
                        <input type="password" class="form-control" name="solicitacoesChefe" id="InputSenha" required>
                    </div>
                    <div id="divEnviar" class="mt-3 mb-3">
                        <button type="submit" name="Enviar" class="btn btn-primary col-12">Enviar</button>
                    </div>

                </form>
            </div>
        </div>
    </section>

    <?php
        if(isset($_POST["Enviar"])){
            header("location: ./criarTabela/criarTabelaChefe.php");
        }
    ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="node_modules/parsleyjs/dist/parsley.min.js"></script>
<script src="node_modules/parsleyjs/dist/i18n/pt-br.js"></script>
</html>

