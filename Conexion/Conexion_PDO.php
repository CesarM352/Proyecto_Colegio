<?php
#Coneccion a la base de datos colegio
$hostname = "localhost";
$database = "colegio";
$username = "root";
$password = "";
$base=new PDO("mysql::host=$hostname; dbname=$database", "$username", "$password");
$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$base->exec("SET CHARACTER SET utf8");
?>