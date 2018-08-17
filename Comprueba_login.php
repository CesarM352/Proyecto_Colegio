<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>No Titulo</title>
</head>

<body>

<?php
try{
    require_once('Conexion/Conexion_PDO.php');

    $sql="SELECT * FROM usuarios WHERE usuario= :usuario AND password= :password";
    $resultado=$base->prepare($sql);

    $usuario=htmlentities(addslashes($_POST["usuario"]));
    $password=htmlentities(addslashes($_POST["password"]));

    $resultado->bindvalue(":usuario", $usuario);
    $resultado->bindvalue(":password", $password);
    
    $resultado->execute();
    
    $numero_registro=$resultado->rowCount();

    if ($numero_registro!=0)
    {
        //Iniciar sesion con el usuario logueado
        session_start();
        $_SESSION["usuario"]=$_POST["usuario"];

        //De acuerdo al perfil del usuario se enviara a paginas diferentes
        $sql1="SELECT perfil_id FROM usuarios WHERE usuario= ?";
        $resultado=$base->prepare($sql1);
        $resultado->execute(array($_SESSION['usuario']));
        //while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
           // $perfil= $registro['perfil_id'];
        //}
        $registro=$resultado->fetch(PDO::FETCH_ASSOC);
            $perfil= $registro['perfil_id'];
        
        if ($perfil==1){
            echo $perfil;
            header("location:Alumno/Principal_alumno.php");
        }else if ($perfil==2){
            header("location:Docente/Principal_docente.php");
        }else{
            header("location:Administrador/Principal_administrador.php");
        }
    }else{
        header("location:login.php");
    }
    $resultado->closeCursor();

}catch(Exception $e){
    die("Error:".$e->getMessage());
}
?>

</body>
</html>