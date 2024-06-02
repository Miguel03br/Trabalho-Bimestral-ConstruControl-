<?php
session_start();
if(isset($_POST["Enviar"])){
    if (isset($_POST["nome"]) &&  isset($_POST["email"]) && isset($_POST["senha"]) && !empty(trim($_POST["nome"])) &&  !empty(trim($_POST["email"])) && !empty(trim($_POST["senha"]))){
        require "01_conexaoBD.php";
        
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        
        $sql = "SELECT * FROM login WHERE nome = :nome AND email = :email AND senha = :senha";
        $resultado = $conn->prepare($sql);
        $resultado->bindValue(":nome", $nome);
        $resultado->bindValue(":email", $email);
        $resultado->bindValue(":senha", $senha);
        $resultado->execute();
        if ($resultado->rowCount() == 1){

            if($email = "Chefe.admin@gmail.com" && $senha = "123"){
                header ("location: ../areaTrabalhoChefe.php");
            }else{
                $sql = "INSERT INTO login (nome, email, senha) VALUES (:nome, :email, :senha)";
                $resultado->bindValue(":nome", $nome);
                $resultado->bindValue(":email", $email);
                $resultado->bindValue(":senha", $senha);
                $resultado->execute();
                header("location: ../areaTrabalho.php");
            }

        } else {
            $sql = "SELECT * FROM login WHERE nome = :nome AND email = :email AND senha = :senha";
            $resultado = $conn->prepare($sql);
            $resultado->bindValue(":nome", $nome);
            $resultado->bindValue(":email", $email);
            $resultado->bindValue(":senha", $senha);
            $resultado->execute();

            if ($resultado->rowCount() == 1) {
                if($email = "Chefe.admin@gmail.com" && $senha = "123"){
                    header("location: ../areaTrabalhoChefe.php");
                }else{
                    header("location: ../areaTrabalho.php");
                }

            }else{
                $sql = "SELECT * FROM login WHERE nome = :nome AND email = :email AND senha = :senha";
                $resultado = $conn->prepare($sql);
                $resultado->bindValue(":nome", $nome);
                $resultado->bindValue(":email", $email);
                $resultado->bindValue(":senha", $senha);
                $resultado->execute();

                if ($resultado->rowCount() == 1){
                    $sql = "SELECT * FROM login WHERE nome = :nome AND email = :email AND senha = :senha";
                    $resultado = $conn->prepare($sql);
                    $resultado->bindValue(":nome", $nome);
                    $resultado->bindValue(":email", $email);
                    $resultado->bindValue(":senha", $senha);
                    $resultado->execute();
                    header ("location: ../cadastrar.php?erro=1");
                }else{
                    $sql = "INSERT INTO login(nome, email,senha) VALUES (:nome, :email,:senha)";
                    $resultado = $conn->prepare($sql);
                    $resultado->bindValue(":nome", $nome);
                    $resultado->bindValue(":email", $email);
                    $resultado->bindValue(":senha", $senha);
                    $resultado->execute();
    
                    header("location: ./criarConta/criarConta.php") ;
                }
            }

        }
    }   
}