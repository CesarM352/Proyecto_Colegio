<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>No Titulo</title>
</head>

<body>

<?php
try{
    $base=new PDO("mysql::host=localhost; dbname=biblioteca", "root", "");
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql="SELECT * FROM empleado WHERE usua_emp= :usuario AND pass_emp= :password";
    $resultado=$base->prepare($sql);

    $usuario=htmlentities(addslashes($_POST["usuario"]));
    $password=htmlentities(addslashes($_POST["password"]));

    $resultado->bindvalue(":usuario", $usuario);
    $resultado->bindvalue(":password", $password);
    $resultado->execute();

    $numero_registro=$resultado->rowCount();

    if ($numero_registro!=0)
    {
        echo "<h2> Adelante!! </h2>";
    }else{
        header("location:index.html");
    }

}catch(Exception $e){
    die("Error:".$e->getMessage());
}



?>

</body>
</html>