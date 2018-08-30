<?php
	$id = $_POST["id"];
	$descripcion = $_POST["descripcion"];

	try{

        require_once('../../Conexion/Conexion_PDO.php');

            //Para iniciar sesion con el usuario logueado
            session_start();
            if(!isset($_SESSION["usuario"])){
                header("Location:../Login.php");
            }

            //guardar datos
            $sql="delete from perfil where id = :id";
            $resultado=$base->prepare($sql);
    		$resultado->bindvalue(":id", $_GET["id"]);
            $resultado->execute();
            $resultado->closeCursor();

            header("Location: perfiles.php");

    }catch(Exception $e){
        die("Error:".$e->getMessage());
    }
?>