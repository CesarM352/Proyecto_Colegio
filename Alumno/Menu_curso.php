<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <link href="../css/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="../css/css/bootstrap.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="../css/principal.css">

  <script src="../css/js/jquery-3.2.1.slim.min.js"></script>
  <script src="../css/js/bootstrap.min.js"></script>

  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    
  <!--
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  -->

</head>

<body style="background-color:#98BFDA;">
    <?php
            require_once('../Conexion/Conexion_PDO.php');

            //Para iniciar sesion con el usuario logueado
            session_start();
            if(!isset($_SESSION["usuario"])){
                header("Location:../Login.php");
            }

            //Para rescatar parametros enviados desde la pagina Menu_curso.php
            $curso_id= $_GET['curso_id'];
            $matricula_id= $_GET['matricula_id'];

            //echo $curso_id;
            //echo $matricula_id;

            //require_once('../Conexion/Conexion_PDO.php');

            //Consulta para mostrar el nombre del curso seleccionado
            $sql="select * from curso inner join grado_nivel on curso.grado_nivel_id=grado_nivel.id
                 where curso.id = ?;";
            $resultado=$base->prepare($sql);
            $resultado->execute(array($curso_id));
            $registro=$resultado->fetch(PDO::FETCH_ASSOC);
                
    ?>
    <div class="row">
        <div class="col-sm-12">
            <table class='table' style='text-align:center; background-color:#FFA746; width:100%; margin: 0 auto'>
                <tr>
                    <td><?php echo $registro['descripcion']; ?></td>
                </tr>
            </table>
            <br>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4" style="background-color:#98BFDA;">
           <div class="container-fluid">
                <div class="list-group list-group-flush" style="text-align:center; background-color:#FFA746; width:100%; margin: 0 auto" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action list-group-item-success" id="list-materiales-list" data-toggle="list" href="#list-Materiales" role="tab" aria-controls="Materiales">Materiales</a>
                    <a class="list-group-item list-group-item-action list-group-item-success" id="list-calendario de examenes-list" data-toggle="list" href="#list-Calendario de Examenes" role="tab" aria-controls="Calendario de Examenes">Calendario de Examenes</a>
                    <a class="list-group-item list-group-item-action list-group-item-success" id="list-trabajos encargados-list" data-toggle="list" href="#list-Trabajos Encargados" role="tab" aria-controls="Trabajos Encargados">Trabajos Encargados</a>
                    <a class="list-group-item list-group-item-action list-group-item-success" id="list-calificaciones-list" data-toggle="list" href="#list-Calificaciones" role="tab" aria-controls="Calificaciones">Calificaciones</a>
                    <a class="list-group-item list-group-item-action list-group-item-success" id="list-docente-list" data-toggle="list" href="#list-Docente" role="tab" aria-controls="Docente">Docente</a>
                </div>
            </div>
        </div>
        <div class="col-sm-8" style="background-color:#98BFDA;">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade" id="list-Materiales" role="tabpanel" aria-labelledby="list-Materiales-list">AAA</div>
                <div class="tab-pane fade" id="list-Calendario de Examenes" role="tabpanel" aria-labelledby="list-Calendario de Examenes-list">BBB</div>
                <div class="tab-pane fade" id="list-Trabajos Encargados" role="tabpanel" aria-labelledby="list-Trabajos Encargados-list">CCC</div>
                <div class="tab-pane fade" id="list-Calificaciones" role="tabpanel" aria-labelledby="list-Calificaciones-list">
                    <?php   //Tabla notas
                        $sql1="select *, curso.descripcion as curso_descripcion, nota_descripcion.descripcion as nota_desc, nota.nota as nota from curso inner join grado_nivel on curso.grado_nivel_id=grado_nivel.id
                        inner join nota on curso.id=nota.curso_id
                        inner join nota_descripcion on nota.nota_descripcion_id=nota_descripcion.id where curso.id = ?;";
                        $resultado=$base->prepare($sql1);
                        //$resultado->execute(array($curso_id));

                        /*if (isset($resultado))
                        {
                            $a=1;
                        }
                        else{
                            $a=0;
                        }
                        echo $a;

                            if ($curso_id==null)
                            {
                                //while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
                                //var_dump(!isset($resultado));
                                /*$resultado=$base->prepare($sql1);
                                $resultado->execute(array($curso_id));
                                while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
                                echo "Adios mundo...!";
                                //echo $registro['nota_desc']; 
                                /*$sql2="select * from nota_descripcion;";
                                $resultado2=$base2->prepare($sql2);
                                $resultado2->execute();
                                $registro2=$resultado2->fetch(PDO::FETCH_ASSOC);
                                echo $registro1['descripcion'];
                                echo "<div class='container'>
                                        <table class='table table-hover table-bordered' style='text-align:left; width:90%; margin: 0 auto; background-color: white'>
                                            <tr> 
                                                <td style='width: 70%'>" . $registro['descripcion'] . "</td>
                                                td style='text-align:center'>0.0</td>
                                            </tr>
                                        </table>
                                     </div>";
                            }
                            else if ($curso_id>=1)
                            {
                                //while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
                                echo "Hola mundo...!";
                                //while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
                                /*echo "<div class='container'>
                                        <table class='table table-hover table-bordered' style='text-align:left; width:90%; margin: 0 auto; background-color: white'>
                                            <tr> 
                                                <td style='width: 70%'>" . $registro['nota_desc'] . "</td>
                                                <td style='text-align:center'>". $registro['nota'] . "</td>
                                            </tr>
                                        </table>
                                     </div>";}
                            }*/
                        
                        
                        /*if (!isset ($registro['nota']))
                        {
                            //echo $registro['nota_desc']; 
                           $resultado->execute(array($curso_id));
                            while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
                                echo "<div class='container'>
                                        <table class='table table-hover table-bordered' style='text-align:left; width:90%; margin: 0 auto; background-color: white'>
                                            <tr> 
                                                <td style='width: 70%'>" . $registro['nota_desc'] . "</td>
                                                
                                            </tr>
                                        </table>
                                    </div>";
                            }
                        }else
                        {*/
                           /* $resultado->execute(array($curso_id));
                            while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
                                echo "<div class='container'>
                                        <table class='table table-hover table-bordered' style='text-align:left; width:90%; margin: 0 auto; background-color: white'>
                                            <tr> 
                                                <td style='width: 70%'>" . $registro['nota_desc'] . "</td>
                                                <td style='text-align:center'>". $registro['nota'] . "</td>
                                            </tr>
                                        </table>
                                     </div>";
                            }*/
                        
                            if (!is_null($sql1)){
                            
                            $resultado->execute(array($curso_id));
                            while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
                                echo "<div class='container'>
                                        <table class='table table-hover table-bordered' style='text-align:left; width:90%; margin: 0 auto; background-color: white'>
                                            <tr> 
                                                <td style='width: 70%'>" . $registro['nota_desc'] . "</td>
                                                <td style='text-align:center'>". $registro['nota'] . "</td>
                                            </tr>
                                        </table>
                                     </div>";
                                }
                            }else{
                                echo "no hay";
                            }
                         ?>
                </div>
                <div class="tab-pane fade" id="list-Docente" role="tabpanel" aria-labelledby="list-Docente-list">
                    <ul class="list-unstyled components">
                    <?php

                        $sql2="select * from curso inner join docente on curso.docente_id=docente.id
                        inner join usuarios on docente.usuarios_id=usuarios.id where curso.id = ?;";
                        $resultado=$base->prepare($sql2);
                        $resultado->execute(array($curso_id));
                        $registro=$resultado->fetch(PDO::FETCH_ASSOC);

                        ?>

                        <li>Nombre:  <?php echo $registro['nombres'] . " " . $registro["apellidos"];?></li>
                        <li>Correo:  <?php echo $registro['correo'];?></li>
                        <li>Telefono:  <?php echo $registro['telefono'];?></li>
                        <li>Pais:  <?php echo $registro['pais'];?></li>
                        <li>Ciudad:  <?php echo $registro['ciudad'];?></li>
                </div>
            </div>
        </div>
    </div>

    <!--<div class="row">
        <div class="col-sm-3">
           <div class="container-fluid">
                <div class="list-group list-group-flush" style="text-align:center; background-color:#FFA746; width:100%; margin: 0 auto">
                    <a href="#" class="list-group-item list-group-item-action list-group-item-success">Materiales</a>
                    <a href="#" class="list-group-item list-group-item-action list-group-item-success">Calendario de Examenes</a>
                    <a href="#" class="list-group-item list-group-item-action list-group-item-success">Trabajos Encargados</a>
                    <a href="#" class="list-group-item list-group-item-action list-group-item-success">Calificaciones</a>
                    <a href="#" class="list-group-item list-group-item-action list-group-item-success">Docente</a>
                </div>
            </div>
        </div>
        <div class="col-sm-9" style="background-color:blue;">
                
        </div>
    </div>



<div class="row">
  <div class="col-4">
    <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Home</a>
      <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Profile</a>
      <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Messages</a>
      <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Settings</a>
    </div>
  </div>
  <div class="col-8">
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">AAA</div>
      <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">BBB</div>
      <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">CCC</div>
      <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">DDD</div>
    </div>
  </div>
</div>

<script>
$('#list-tab a').on('click', function (e) {
  e.preventDefault()
  $(this).tab('show')
})
</script>
-->

</body>
</html>
