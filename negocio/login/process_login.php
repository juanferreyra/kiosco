<?php
include 'db_connect.php';
include 'loginDatabaseLinker.class.php';
sec_session_start(); //Nuestra manera personalizada segura de iniciar sesión php.
 
if(isset($_POST['user'], $_POST['p'])) {
    $user = $_POST['user'];
    $password = $_POST['p']; //La contraseña con hash
    if(login($user, $password, $mysqli) == true) 
    {
        //Inicio de sesión exitosa
        echo 'Éxito: ¡Has iniciado sesión!';
    } 
    else 
    {
        //Inicio de sesión fallida
        header('Location: ./login.php?error=1');
    }
} 
else 
{
   //Las variaciones publicadas correctas no se enviaron a esta página
  echo 'Solicitud no válida';
}
?>