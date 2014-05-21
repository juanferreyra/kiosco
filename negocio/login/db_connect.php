<?php
define("HOST", "localhost"); //El alojamiento al que deseas conectarte.
define("USER", "root"); //El nombre de usuario de la base de datos.
define("PASSWORD", "f0rm4t1c4"); //La contraseña de la base de datos.
define("DATABASE", "Kiosco"); //El nombre de la base de datos.
$mysqli = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
//Si te conectas a través de TCP/IP en lugar de un socket de UNIX recuerda agregar el número de puerto como un parámetro.
?>