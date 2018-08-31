<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link href="../../css/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../../css/principal.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
</head>

<body style="background-size:100% 110%;">   

    <?php
    try{

            require_once('../../Conexion/Conexion_PDO.php');

                //Para iniciar sesion con el usuario logueado
                session_start();
                if(!isset($_SESSION["usuario"])){
                    header("Location:../Login.php");
                }

                //Consulta para obtener el mayor id
                $sql="select max(id) as max_id from perfil";
                $resultado=$base->prepare($sql);
                $resultado->execute();
                
                $registro=$resultado->fetch(PDO::FETCH_ASSOC);
                $id_max = 1;
                if(!is_null($registro["max_id"])){
                    $id_max = $registro["max_id"]+1;
                }
                $resultado->closeCursor();

        }catch(Exception $e){
            die("Error:".$e->getMessage());
        }
    ?>

    <div class="container">
        <form class="form-horizontal" action="guardar.php" method="POST">
          <div class="form-group">
            <label class="control-label col-sm-10" for="email">Id:</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="id" name="id" value="<?php echo $id_max; ?>" readonly>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-10" for="pwd">Descripción del Perfil:</label>
            <div class="col-sm-10"> 
              <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese el nombre de un perfil(max: 45)">
            </div>
          </div>
          <div class="form-group"> 
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default">Guardar</button>
            </div>
          </div>
        </form>
    </div>
    
</body>
</html>