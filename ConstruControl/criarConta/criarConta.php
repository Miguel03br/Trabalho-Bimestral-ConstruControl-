<?php
if(isset($_POST["Enviar"])){
    if (isset($_POST["email"]) && isset($_POST["senha"]) && isset($_POST["nome"]) && !empty(trim($_POST["email"])) && !empty(trim($_POST["senha"])) && !empty(trim($_POST["nome"]))){
        require "01_conexaoBD.php";
        
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        
        $sql = "SELECT * FROM login WHERE  nome = :nome AND email = :email AND senha = :senha";
        $resultado = $conn->prepare($sql);
        $resultado->bindValue(":nome", $nome);
        $resultado->bindValue(":email", $email);
        $resultado->bindValue(":senha", $senha);
        $resultado->execute();
        if ($resultado->rowCount() == 1){

            if($email = "Chefe.admin@gmail.com" && $senha = "123"){
                require "./06_areaTrabalhoChefe.php";
            }else{
                require "04_areaTrabalho.php";
            }

        } else {
            $sql = "INSERT INTO login(nome,email,senha) VALUES (:nome,:email,:senha)";
            $resultado = $conn->prepare($sql);
            $resultado->bindValue(":nome", $nome);
            $resultado->bindValue(":email", $email);
            $resultado->bindValue(":senha", $senha);
            $resultado->execute();
            
            if($email = "Chefe.admin@gmail.com" && $senha = "123"){
                require "./06_areaTrabalhoChefe.php";
            }else{
                header("04_areaTrabalho.php");
            }
        }
    }   
}