<?php
session_start();
if(isset($_POST["Enviar"])){
    if (isset($_POST["email"]) && isset($_POST["senha"]) && !empty(trim($_POST["email"])) && !empty(trim($_POST["senha"]))){
        require "01_conexaoBD.php";
        
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        
        $sql = "SELECT * FROM login WHERE email = :email AND senha = :senha";
        $resultado = $conn->prepare($sql);
        $resultado->bindValue(":email", $email);
        $resultado->bindValue(":senha", $senha);
        $resultado->execute();
        if ($resultado->rowCount() == 1){
            if($email == "Chefe.admin@gmail.com" && $senha = 123){
                require "areaTrabalhoChefe.php";
            }else{
                require "areaTrabalho.php";
            }
        } else {
            header("location: login.php?erro=1"); 
        }
    }   
}











