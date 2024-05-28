<?php
    if(isset($_GET["sucesso"])){
        $nomeConstrucao = $_GET["nome_construcao"];
        echo "<div>Projeto" . $nomeConstrucao . " adicionado com sucesso</div>";
    }