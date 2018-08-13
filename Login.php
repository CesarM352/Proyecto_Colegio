<!DOCTYPE html>
<html lang="en" >

<head>

  <meta charset="UTF-8">
  <title>Login</title>
  
  <link href="css/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/css/bootstrap.css" rel="stylesheet" type="text/css"/>
  <!--Para centrar columnas y agregar iconos a los cuadros de texto-->
  <link href="css/login.css" rel="stylesheet" type="text/css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>

</head>

<body class="container" style="background-color:#1B2F62;">
  <br><br>
  <form action="Comprueba_login.php" method="post">
    <div class="container-fluid">
      <div class="row">
        <div class="col-2 col-sm-2">
        </div>
        <div class="col-4 col-sm-4" style="background-color:#2E668A;">
          <p><br><br></p>
          <h2 class="text-warning" align="center"><strong>BIENVENIDO</strong></h2>
          <br>
          <div align="center">
            <label class="text-warning" for="usuario"><strong>USUARIO</strong></label>
          </div>
          <div class="col-center form-group has-feedback col-md-7">
            <i class="fa fa-user form-control-feedback"></i>
            <input type="text" class="form-control" id="usuario" name="usuario">
          </div>
          <br>
          <div align="center">
            <label class="text-warning" for="contraseña"><strong>CONTRASEÑA</strong></label>
          </div>
          <div class="col-center form-group has-feedback col-md-7">
            <i class="fa fa-lock form-control-feedback"></i>
            <input type="password" class="form-control" id="contraseña" name="password">
          </div>
          <br>
          <div class="form-group" align="center">
            <button type="submit" class="btn btn-primary" name="enviar">INGRESAR</button>
          </div>
        </div>
        <div class="col-4 col-sm-4" style="background-color:white;">
          <div class="img">
            <img src="img/Administracion.png" width="350" height="450">
          </div>
        </div>
        <div class="col-2 col-sm-2">
        </div>
      </div>
    </div>
  </form>
</body>
</html>
