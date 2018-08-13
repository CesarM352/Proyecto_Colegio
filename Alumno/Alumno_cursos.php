<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link href="../css/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../css/principal.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
</head>

<body style="background-color:yellow">
    <br><br>
    <?php
        try{

            require_once('../Conexion_DB.php');

                //Para iniciar sesion con el usuario logueado
                session_start();
                if(!isset($_SESSION["usuario"])){
                    header("Location:../Login.php");
                }

                //Consulta para listar los cursos del usuario logueado
                $sql="select * from usuarios inner join alumno on usuarios.id = alumno.usuarios_id
                inner join matricula on alumno.id = matricula.alumno_id
                inner join grado_nivel on matricula.grado_nivel_id = grado_nivel.id
                inner join curso on curso.grado_nivel_id = matricula.grado_nivel_id where usuarios.usuario = ?;";
                $resultado=$base->prepare($sql);
                $resultado->execute(array($_SESSION['usuario']));
                $registro=$resultado->fetch(PDO::FETCH_ASSOC);
                echo "Grado: " . $registro['grado'] . "   Nivel: " . $registro['nivel'] . "<br><br>";
                while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
                echo "<ul> <li> <a href='#' target='base'>" . $registro['descripcion'] . "</a></li></ul>";
                }
                $resultado->closeCursor();

        }catch(Exception $e){
            die("Error:".$e->getMessage());
        }
    ?>
</body>
</html>