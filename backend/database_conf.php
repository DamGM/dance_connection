<?php
// crea fichero DB si no existe
if(!is_file('db/db_member.sqlite3')){
	file_put_contents('db/db_member.sqlite3', null);
}

// conecta DB
$conn = new PDO('sqlite:db/db_member.sqlite3');

// Configura los atributos de la conexión
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Query para la creación de la tabla de usuarios
$query = "CREATE TABLE IF NOT EXISTS member
(user_id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
 username TEXT, 
 password TEXT, 
 email TEXT, 
 user_type TEXT,
 dance_style TEXT,
 city TEXT
 )";

// Ejecuta la query
$conn->exec($query);
?>