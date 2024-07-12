<?php

// voir les pilotes disponibles avec la conf de PHP
//var_dump(PDO::getAvailableDrivers());

$cnx = new PDO('mysql:host=localhost;dbname=bac-2', 'root', '');

$cnx->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
