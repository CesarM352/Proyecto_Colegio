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

<body style="background-image: url('../img/fondo_alumno.jpg');background-size:100% 110%;">
    <br>
    <?php
        try{

            require_once('../Conexion/Conexion_PDO.php');

                //Para iniciar sesion con el usuario logueado
                session_start();
                if(!isset($_SESSION["usuario"])){
                    header("Location:../Login.php");
                }

                //Consulta para listar los cursos del usuario logueado
                $sql="select *, matricula.id as matricula_id from usuarios inner join alumno on usuarios.id = alumno.usuarios_id
                inner join matricula on alumno.id = matricula.alumno_id
                inner join grado_nivel on matricula.grado_nivel_id = grado_nivel.id
                inner join curso on curso.grado_nivel_id = matricula.grado_nivel_id where usuarios.usuario = ?;";
                $resultado=$base->prepare($sql);
                $resultado->execute(array($_SESSION['usuario']));
                $registro=$resultado->fetch(PDO::FETCH_ASSOC);
                echo "<table class='table' style='text-align:center; background-color:#FFA746; width:40%; margin: 0 auto'>
                        <thead>
                            <tr>
                                <th>" . $registro['grado'] . ' Grado de ' . $registro['nivel'] . "</th>
                            </tr>
                        </thead>
                      </table>
                      <table class='table table-hover table-bordered' style='text-align:center; width:40%; margin: 0 auto; background-color:white;'>
                        <tbody>";
                while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
                    //var_dump($registro);
                    echo  "<tr><td><a href='Menu_curso.php?curso_id=" . $registro['id'] . "&matricula_id=" . $registro['matricula_id'] . "' target='base'>" . $registro['descripcion'] . "</a></td></tr>";
                }
                echo"</tbody></table>";
                //while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
                    //echo "<ul> <li> <a href='#' target='base'>" . $registro['descripcion'] . "</a></li></ul>";
                //}
                $resultado->closeCursor();

        }catch(Exception $e){
            die("Error:".$e->getMessage());
        }
    ?>
</body>
</html>