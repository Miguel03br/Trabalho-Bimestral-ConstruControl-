<?php
if(isset($_POST["AddProj"])){
    if (isset($_POST["nomeConstrucao"]) && isset($_POST["dataFinal"]) && isset($_POST["processoAndamento"]) && isset($_POST["solicitacoes"]) && !empty(trim($_POST["nomeConstrucao"])) && !empty(trim($_POST["dataFinal"])) && !empty(trim($_POST["processoAndamento"]))){
        require "01_conexaoBD.php";
        
        $nomeConstrucao = $_POST["nomeConstrucao"];
        $dataFinal = $_POST["dataFinal"];
        $processoAndamento = $_POST["processoAndamento"];
        $solicitacoes = $_POST["solicitacoes"];

        $sql = "SELECT * FROM tabelas WHERE nome_construcao = :nome_construcao AND data_final = :data_final AND processo_andamento = :processo_andamento AND solicitacao = :solicitacao";
        $resultado = $conn->prepare($sql);
        $resultado->bindValue(":nome_construcao", $nomeConstrucao);
        $resultado->bindValue(":data_final", $dataFinal);
        $resultado->bindValue(":processo_andamento", $processoAndamento);
        $resultado->bindValue(":solicitacao", $solicitacoes);
        $resultado->execute();
        if ($resultado->rowCount() == 1){

        header("location: ../areaTrabalho.php?erro=1");

        } else {
            $sql = "SELECT * FROM tabelas WHERE nome_construcao = :nome_construcao";
            $resultado = $conn->prepare($sql);
            $resultado->bindValue(":nome_construcao", $nomeConstrucao);
            $resultado->execute();

            if($resultado->rowCount() == 1){
                header("location: ../areaTrabalho.php?erro2=1");
            }else{
                $sql = "INSERT INTO tabelas(nome_construcao, data_final, processo_andamento, solicitacao) VALUES (:nome_construcao, :data_final, :processo_andamento, :solicitacao)";
                $resultado = $conn->prepare($sql);
                $resultado->bindValue(":nome_construcao", $nomeConstrucao);
                $resultado->bindValue(":data_final", $dataFinal);
                $resultado->bindValue(":processo_andamento", $processoAndamento);
                $resultado->bindValue(":solicitacao", $solicitacoes);
                $resultado->execute();
            
                header ("location: ../areaTrabalho.php?sucesso=1");
            }
        }

    }elseif(isset($_POST["nomeConstrucao"]) && isset($_POST["dataFinal"]) && isset($_POST["processoAndamento"]) && !isset($_POST["solicitacoes"]) && !empty(trim($_POST["nomeConstrucao"])) && !empty(trim($_POST["dataFinal"])) && !empty(trim($_POST["processoAndamento"]))){
    require "01_conexaoBD.php";
        
        $nomeConstrucao = $_POST["nomeConstrucao"];
        $dataFinal = $_POST["dataFinal"];
        $processoAndamento = $_POST["processoAndamento"];

        $sql = "SELECT * FROM tabelas WHERE nome_construcao = :nome_construcao AND data_final = :data_final AND processo_andamento = :processo_andamento";
        $resultado = $conn->prepare($sql);
        $resultado->bindValue(":nome_construcao", $nomeConstrucao);
        $resultado->bindValue(":data_final", $dataFinal);
        $resultado->bindValue(":processo_andamento", $processoAndamento);
        $resultado->execute();
        if ($resultado->rowCount() == 1){

        header("location: ../areaTrabalho.php?erro=1");

        } else {
            $sql = "SELECT * FROM tabelas WHERE nome_construcao = :nome_construcao";
            $resultado = $conn->prepare($sql);
            $resultado->bindValue(":nome_construcao", $nomeConstrucao);
            $resultado->execute();

            if($resultado->rowCount() == 1){
                header("location: ../areaTrabalho.php?erro2=1");
            }else{
                $sql = "INSERT INTO tabelas(nome_construcao, data_final, processo_andamento) VALUES (:nome_construcao, :data_final, :processo_andamento)";
                $resultado = $conn->prepare($sql);
                $resultado->bindValue(":nome_construcao", $nomeConstrucao);
                $resultado->bindValue(":data_final", $dataFinal);
                $resultado->bindValue(":processo_andamento", $processoAndamento);
                $resultado->execute();
            
                header ("location: ../areaTrabalho.php?sucesso=1");
            }
        }
    }
}
