<?php

$mysqli = new mysqli("localhost", "db_user", "YES", "blog");

if ($mysqli->connect_error) die("un problème est survenu lors de la tentative de connxion a la BDD:.$mysqli->connect_error");

require(__DIR__ . DIRECTORY_SEPARATOR . "function.php");

$contenu = '';


// $mysqli->query("INSERT INTO blog.`user`
//         (id_user, pseudo, passwrd, email)
//         VALUES(0, 'kevindwwm', 'encoresecret', 'tropcurieux');");


// try {
// 	$pdo = new PDO('mysql:host=localhost;dbname=blog', "db_user", "YES", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

// 	if ($pdo) {
// 		$result = $pdo -> exec("INSERT INTO blog.`user`
//         (id_user, pseudo, passwrd, email)
//         VALUES(0, 'mathieudwwm', 'secret', 'curieux@gmail.com');");
//         echo "Requête bien effectuée!";
// 	}
// } catch (PDOException $e) {
// 	echo $e->getMessage();
// }