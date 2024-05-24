<?php

const DBHOST = 'db';
const DBUSER = 'php_docker';
const DBPASS = 'password';
const DBNAME = 'php_docker';

$dsn = "mysql:host=". DBHOST . ";dbname=" . DBNAME;

try {
    $db = new PDO($dsn, DBUSER, DBPASS);
    echo "Connexion établie avec succès";
} catch (PDOException $e) {
    echo "Un erreur est survenue: ".$e->getMessage();
    die;
}