<?php 
    
        $servidor = "localhost";
        $usuario = "root";
        $password = "";
        $bdname = "ciudad";

        $conn = new mysqli($servidor,$usuario,$password,$bdname);

        if($conn->connect_error){
            echo $error= $conn->connect_error;
        }
?>