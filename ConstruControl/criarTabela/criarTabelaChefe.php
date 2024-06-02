<?php
if(isset($_POST["AddProj"])){
    if (isset($_POST["nomeConstrucaoChefe"]) && isset($_POST["dataFinalChefe"]) && isset($_POST["processoAndamentoChefe"]) && isset($_POST["solicitacoesChefe"]) && !empty(trim($_POST["nomeConstrucaoChefe"])) && !empty(trim($_POST["dataFinalChefe"])) && !empty(trim($_POST["processoAndamentoChefe"]))){
        require "01_conexaoBD.php";
        
        $nomeConstrucaoChefe = $_POST["nomeConstrucaoChefe"];
        $dataFinalChefe = $_POST["dataFinalChefe"];
        $processoAndamentoChefe = $_POST["processoAndamentoChefe"];
        $solicitacoes = $_POST["solicitacoesChefe"];

        $sql = "SELECT * FROM tabelas_chefe WHERE nome_construcao_chefe = :nome_construcao_chefe AND data_final_chefe = :data_final_chefe AND processo_andamento_chefe = :processo_andamento_chefe AND solicitacao_chefe = :solicitacao_chefe";
        $resultado = $conn->prepare($sql);
        $resultado->bindValue(":nome_construcao_chefe", $nomeConstrucaoChefe);
        $resultado->bindValue(":data_final_chefe", $dataFinalChefe);
        $resultado->bindValue(":processo_andamento_chefe", $processoAndamentoChefe);
        $resultado->bindValue(":solicitacao_chefe", $solicitacoesChefe);
        $resultado->execute();
        if ($resultado->rowCount() == 1){

        header("location: ../areaTrabalhoChefe.php?erro=1");

        } else {
            $sql = "SELECT * FROM tabelas_chefe WHERE nome_construcao_chefe = :nome_construcao_chefe";
            $resultado = $conn->prepare($sql);
            $resultado->bindValue(":nome_construcao_chefe", $nomeConstrucaoChefe);
            $resultado->execute();

            if($resultado->rowCount() == 1){
                header("location: ../areaTrabalhoChefe.php?erro2=1");
            }else{
                $sql = "INSERT INTO tabelas_chefe (nome_construcao_chefe, data_final_chefe, processo_andamento_chefe, solicitacao_chefe) VALUES (:nome_construcao_chefe, :data_final_chefe, :processo_andamento_chefe, :solicitacao_chefe)";
                $resultado = $conn->prepare($sql);
                $resultado->bindValue(":nome_construcao_chefe", $nomeConstrucaoChefe);
                $resultado->bindValue(":data_final_chefe", $dataFinalChefe);
                $resultado->bindValue(":processo_andamento_chefe", $processoAndamentoChefe);
                $resultado->bindValue(":solicitacao_chefe", $solicitacoesChefe);
                $resultado->execute();
            
                header ("location: ../areaTrabalhoChefe.php?sucesso=1");
            }
        }

    }elseif(isset($_POST["nomeConstrucaoChefe"]) && isset($_POST["dataFinalChefe"]) && isset($_POST["processoAndamentoChefe"]) && !isset($_POST["solicitacoesChefe"]) && !empty(trim($_POST["nomeConstrucaoChefe"])) && !empty(trim($_POST["dataFinalChefe"])) && !empty(trim($_POST["processoAndamentoChefe"]))){
        require "01_conexaoBD.php";
        
        $nomeConstrucaoChefe = $_POST["nomeConstrucaoChefe"];
        $dataFinalChefe = $_POST["dataFinalChefe"];
        $processoAndamentoChefe = $_POST["processoAndamentoChefe"];

        $sql = "SELECT * FROM tabelas_chefe WHERE nome_construcao_chefe = :nome_construcao_chefe AND data_final_chefe = :data_final_chefe AND processo_andamento_chefe = :processo_andamento_chefe";
        $resultado = $conn->prepare($sql);
        $resultado->bindValue(":nome_construcao_chefe", $nomeConstrucaoChefe);
        $resultado->bindValue(":data_final_chefe", $dataFinalChefe);
        $resultado->bindValue(":processo_andamento_chefe", $processoAndamentoChefe);
        $resultado->execute();
        if ($resultado->rowCount() == 1){

        header("location: ../areaTrabalhoChefe.php?erro=1");

        } else {
            $sql = "SELECT * FROM tabelas_chefe WHERE nome_construcao_chefe = :nome_construcao_chefe";
            $resultado = $conn->prepare($sql);
            $resultado->bindValue(":nome_construcao_chefe", $nomeConstrucaoChefe);
            $resultado->execute();

            if($resultado->rowCount() == 1){
                header("location: ../areaTrabalhoChefe.php?erro2=1");
            }else{
                $sql = "INSERT INTO tabelas_chefe (nome_construcao_chefe, data_final_chefe, processo_andamento_chefe) VALUES (:nome_construcao_chefe, :data_final_chefe, :processo_andamento_chefe)";
                $resultado = $conn->prepare($sql);
                $resultado->bindValue(":nome_construcao_chefe", $nomeConstrucaoChefe);
                $resultado->bindValue(":data_final_chefe", $dataFinalChefe);
                $resultado->bindValue(":processo_andamento_chefe", $processoAndamentoChefe);
                $resultado->execute();
            
                header ("location: ../areaTrabalhoChefe.php?sucesso=1");
            }
        }
    }  
}
