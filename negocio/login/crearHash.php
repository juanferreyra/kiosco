<?php
//La contraseña en hash desde la forma
$password = 1234;
//Crea una salt al azar
$random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
//Crea una contraseña en salt (Cuidado de no pasarte)
$password = hash('sha512', $password.$random_salt);
//Agrega tu inserto a la secuencia de comandos de la base de datos aquí.
//¡Asegúrate de usar comandos preparados!
if ($insert_stmt = $mysqli->prepare("INSERT INTO members (username, email, password, salt) VALUES (?, ?, ?, ?)")) {     
   $insert_stmt->bind_param('ssss', $username, $email, $password, $random_salt);
   //Ejecuta la consulta preparada.
   $insert_stmt->execute();
}
?>
