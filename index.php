<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= "Titre du document" ?></title>

    <style>
        table {
            border: 1px solid black;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid black;
            padding: 3px 5px;
        }
        
        thead th {
            background-color: #ccc;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
<h2>Cours de Programmation Web II</h2>

<?php

$cnx = new PDO('mysql:host=localhost;dbname=bac-2', 'root', '');

$cnx->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

$req = $cnx->prepare("SELECT * FROM etudiants");

$req->execute();
?>

<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Nom</th>
        <th>Postnom</th>
        <th>Age</th>
    </tr>
    </thead>

    <tbody>
    <?php foreach ($req as $etudiant) : ?>
    <tr>
        <td class="text-center"></td>
        <td><?php echo $etudiant->nom; ?></td>
        <td><?php echo $etudiant->postnom; ?></td>
        <td class="text-center"><?php echo $etudiant->age; ?> ans</td>
    </tr>
    <?php endforeach; ?>
    </tbody>

</table>

</body>
</html>