<?php
if(isset($_POST["AddProj"])){
    if (isset($_POST["nomeConstrucao"]) && isset($_POST["dataFinal"]) && isset($_POST["processoAndamento"]) && isset($_POST["solicitacao"]) && !empty(trim($_POST["nomeConstrucao"])) && !empty(trim($_POST["dataFinal"])) && !empty(trim($_POST["processoAndamento"]))) {
        require "01_conexaoBD.php";

        $nomeConstrucao = $_POST["nomeConstrucao"];
        $dataFinal = $_POST["dataFinal"];
        $processoAndamento = $_POST["processoAndamento"];
        $solicitacao = $_POST["solicitacao"];

        $sql = "SELECT * FROM tabelas WHERE nome_construcao = :nome_construcao AND data_final = :dataFinal AND processo_andamento = :processoAndamento AND solicitacao = :solicitacao";
        $resultado = $conn->prepare($sql);
        $resultado->bindValue(":nome_construcao", $nomeConstrucao);
        $resultado->bindValue(":data_final", $dataFinal);
        $resultado->bindValue(":processo_andamento", $processoAndamento);
        $resultado->bindValue(":solicitao", $solicitao);
        $resultado->execute();
        if($resultado->rowCount() == 1){
            header ("location: 04_areaTrabalho.php");
        }else{
            $sql = "SELECT * FROM tabelas WHERE nome_construcao = :nome_construcao AND data_final = :dataFinal AND processo_andamento = :processoAndamento AND solicitacao = :solicitacao";
            $resultado->bindValue(":nome_construcao", $nomeConstrucao);
            $resultado = $conn->prepare($sql);
            $resultado->bindValue(":data_final", $dataFinal);
            $resultado->bindValue(":processo_andamento", $processoAndamento);
            $resultado->bindValue(":solicitao", $solicitao);
            $resultado->execute();

            if($resultado->rowCount() == 1){
                header("location: 04_areaTrabalho.php?erro=1");
            }else{
            $sql = "INSERT INTO tabelas(nome_construcao, data_final, processo_andamento, solicitacao) VALUES (:nome_construcao, :data_final, :processo_andamento, :solicitacao)";
            $resultado = $conn->prepare($sql);
            $resultado->bindValue(":nome_construcao", $nomeConstrucao);
            $resultado->bindValue(":data_final", $dataFinal);
            $resultado->bindValue(":processo_andamento", $processoAndamento);
            $resultado->bindValue(":solicitao", $solicitao);
            $resultado->execute();

            require "./criarTabela/criarTabela.php";
            }
        }
    }
}
