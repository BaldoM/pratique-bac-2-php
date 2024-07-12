<?php

// Deux types de tableaux
// Indexé et Associatif

$tab = array(true, "Bonjour", 10, 80.9);

$etudiant = [
    "nom" => "KASONGO",
    'postnom' => "ILUNGA",
    'age' => 19,
];

$etudiant['age'] = 21;

$etudiant['sexe'] = "F";

/*for ($i = 0; $i < count($tab); $i++) {
    echo $tab[$i] . "<br>";
}*/

foreach ($etudiant as $key => $value) {
    echo $key .  ' : ' . $value . "<br>";
}