<?php

// voir les pilotes disponibles avec la conf de PHP
// var_dump(PDO::getAvailableDrivers());


// Connexion à la base de données mysql
//$cnx = new PDO('mysql:host=localhost;dbname=bac-2', 'root', '');


// Connexion à la base de données access
 var_dump(file_exists(__DIR__ . DIRECTORY_SEPARATOR . 'bac-2.accdb'));
//$cnx = new PDO('odbc:Driver={Microsoft Access Driver (*.mdb, *.accdb)};Dbq=' . __DIR__ . DIRECTORY_SEPARATOR . 'bac-2.accdb;Uid=;Pwd=');


// Gestion des erreurs
$cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$cnx->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
