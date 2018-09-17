<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Principal_Alumno</title>

    <link href="../css/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../css/principal.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <!-- Font Awesome JS 
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    -->
    
</head>

<body>
    <?php
        //Para iniciar sesion con el usuario logueado
        session_start();
        if(!isset($_SESSION["usuario"])){
            header("Location:../Login.php");
        }
        //Para obtener el nombre del usuario logueado
        try{
            require_once('../Conexion/Conexion_PDO.php');
        
            $sql="SELECT nombres,apellidos FROM usuarios WHERE usuario= ?";
            $resultado=$base->prepare($sql);
            $resultado->execute(array($_SESSION['usuario']));

            while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
                $nombres= $registro['nombres'];
                $apellidos=$registro['apellidos'];
            }
            $resultado->closeCursor();
        }catch(Exception $e){
            die("Error:".$e->getMessage());
        }
    ?>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header" align="center">
                <h4>Bienvenido</h4>
                <img <img src="../img/avatar-1.jpg" class="img-fluid rounded-circle img-thumbnail" width="70" height="70" ><br>
                <h10><small>
                    <?php
                    echo $nombres . " " . $apellidos;  
                    $resultado->closeCursor();             
                    ?>
                </small></h10>
                <h6 class="bg-info">Alumno</h6>
            </div>
            <ul class="list-unstyled components">
                <!--<li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-copy"></i> Cursos</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#">Home 1</a>
                        </li>
                        <li>
                            <a href="#">Home 2</a>
                        </li>
                        <li>
                            <a href="#">Home 3</a>
                        </li>
                    </ul>
                </li>-->
                <li>
                    <a href="Alumno_cursos.php" target="base">
                        <i class="fa fa-book-open"></i> Cursos</a>
                    <a href="#">
                        <i class="far fa-clock-o"></i> Horario</a>
                    <a href="#">
                        <i class="fa fa-signal"></i> Record Académico</a>
                    <a href="#">
                        <i class="fa fa-usd"></i> Estado de Cuenta</a>
                    <a href="#">
                        <i class="fa fa-book"></i> Biblioteca Virtual</a>
                    <a href="#">
                        <i class="fa fa-bars"></i> Asistencias</a>
                    <a href="#">
                        <i class="fa fa-cubes"></i> Utilitarios</a>
                    <a href="#">
                        <i class="fa fa-institution"></i> Normas del Colegio</a>
                    <a href="#">
                        <i class="fa fa-user-tie"></i> Docentes</a>
                </li>
                    <!--<a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-copy"></i>
                        Pages
                    </a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="#">Page 1</a>
                        </li>
                        <li>
                            <a href="#">Page 2</a>
                        </li>
                        <li>
                            <a href="#">Page 3</a>
                        </li>
                    </ul>-->
            </ul>
            <!--<ul class="list-unstyled CTAs">
                <li>
                    <a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a>
                </li>
                <li>
                    <a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a>
                </li>
            </ul>-->
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-info" >
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fa fa-align-left"></i>
                        <!--<i class="fas fa-align-left"></i>-->
                        <span>Ocultar</span>
                    </button>
                    <!--<button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>-->
                    <div id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            
                            <button type="button" class="btn btn-warning" onclick="location.href = '../Logout.php';">
                            <span>Salir</span>
                            </button>
                            <!--<li class="nav-item">
                                <a class="nav-link" href="Login.php">Salir</a>
                            </li>-->
                        </ul>
                    </div>
                </div>
            </nav>
            <iframe src="Contenedor_alumno.php" name="base" scrolling="auto" width="100%" height="100%" style="border:none">
            </iframe>
        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>

</html>