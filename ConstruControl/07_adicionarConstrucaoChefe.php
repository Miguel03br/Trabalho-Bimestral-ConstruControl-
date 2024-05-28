<?php
if(isset($_POST["AddProjChefe"])){
    if (isset($_POST["nomeConstrucaoChefe"]) && isset($_POST["dataFinalChefe"]) && isset($_POST["processoAndamentoChefe"]) && isset($_POST["solicitacaoChefe"]) && !empty(trim($_POST["nomeConstrucaoChefe"])) && !empty(trim($_POST["dataFinalChefe"])) && !empty(trim($_POST["processoAndamentoChefe"]))) {
        require "01_conexao.php";

        $nomeConstrucaoChefe = $_POST["nomeConstrucaoChefe"];
        $dataFinalChefe = $_POST["dataFinalChefe"];
        $processoAndamentoChefe = $_POST["processoAndamentoChefe"];
        $solicitacaoChefe = $_POST["solicitacaoChefe"];

        $sql = "SELECT * FROM tabelas_chefe WHERE nome_construcao_chefe = :nome_construcao_chefe AND data_final_chefe = :dataFinal_chefe AND processo_andamento_chefe = :processoAndamento_chefe AND solicitacao_chefe = :solicitacao_chefe";
        $resultado = $conn->prepare($sql);
        $resultado->bindValue(":nome_construcao_chefe", $nomeConstrucaoChefe);
        $resultado->bindValue(":data_final_chefe", $dataFinalChefe);
        $resultado->bindValue(":processo_andamento_chefe", $processoAndamentoChefe);
        $resultado->bindValue(":solicitao_chefe", $solicitaoChefe);
        $resultado->execute();
        if($resultado->rowCount() == 1){
            header ("location: 06_areaTrabalhoChefe.php");
        }else{
            $sql = "INSERT INTO tabelas_chefe(nome_construcao, data_final, processo_andamento, solicitacao) VALUES (:nome_construcao, :data_final, :processo_andamento, :solicitacao)";
            $resultado = $conn->prepare($sql);
            $resultado->bindValue(":nome_construcao", $nomeConstrucao);
            $resultado->bindValue(":data_final", $dataFinal);
            $resultado->bindValue(":processo_andamento", $processoAndamento);
            $resultado->bindValue(":solicitao", $solicitao);
            $resultado->execute();

            require "./criarTabela/criarTabelaChefe.php";
        }
    }
}
