<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="node_modules/parsleyjs/src/parsley.css">
    <title>ConstruControl</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    #secao {
        width: 100%;
        height: 100vh;
        background-image: url(imagens/fundoLogin.png);
        background-size: cover;
    }

    #formulario {
        display: flex;
        justify-content: center;
        width: 100%;
        height: 100vh;
    }

    #divFormulario {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 400px;
    }

    #form {
        border: 2.30px solid white;
        border-radius: 10px;
        backdrop-filter: blur(10px);
        width: 350px;
        text-align: center;
        padding: 0 20px;
    }

    #divEmail,
    #divSenha,
    #divEnviar {
        display: flex;
        justify-content: center;
    }

    img {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        margin-bottom: 20px;
        margin-top: 20px;
    }

    .parsley-required {
        color: red;
    }
</style>

<body>
    <section id="secao">
        <div id="formulario">
            <div id="divFormulario" class="">
                <form data-parsley-validate id="form" class="mb-3" action="03_verificarLogin.php" method="POST">
                    <img src="./imagens/perfil.jpg" class="mt-3" alt="">

                    <?php
                    if (isset($_GET["erro"])) {
                        echo "
                        <div class='alert alert-danger' role='alert'>
                            Este E-mail ou senha já está sendo usado por outro usuário, por favor tente inserir um novo!
                        </div>";
                    }
                    ?>

                    <div class="form-floating mt-4">
                        <input type="text" class="form-control" name="nome" id="InputNome" required>
                        <label for="InputNome">Nome</label>
                    </div>
                    <div class="form-floating mt-3">
                        <input type="email" class="form-control" name="email" id="InputEmail" required>
                        <label for="InputEmail">Email</label>
                    </div>
                    <div class="form-floating mt-3">
                        <input type="password" class="form-control" name="senha" id="InputSenha" required>
                        <label for="InputSenha">Senha</label>
                    </div>
                    <div id="divEnviar" class="mt-3 mb-3">
                        <button type="submit" name="Enviar" class="btn btn-primary col-12">Enviar</button>
                    </div>

                </form>
            </div>
        </div>
    </section>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="node_modules/parsleyjs/dist/parsley.min.js"></script>
<script src="node_modules/parsleyjs/dist/i18n/pt-br.js"></script>

</html>