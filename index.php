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

        a.btn {
            display: inline-block;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 5px;
            border: 1px solid #2a2a2a;
            color: #2a2a2a;
        }

        .mb1 {
            margin-bottom: 1rem;
        }

        .btn-danger {
            background-color: #e31b56;
            color: #fff;
        }

        .btn-info {
            background-color: #5bc0de;
            color: #fff;
        }

        .btn-warning {
            background-color: #f0ad4e;
            color: #fff;
        }
    </style>
</head>
<body>
<h2>Cours de Programmation Web II</h2>

<?php

include_once 'include/db.php';

if (isset($_GET) && !empty($_GET['id']))
{
    $req = $cnx->prepare('DELETE FROM etudiants WHERE id = :id');

    $req->execute([
        'id' => $_GET['id'],
    ]);
}



$req = $cnx->prepare("SELECT * FROM etudiants");

$req->execute();
?>

<a href="creer.php" class="btn btn-info mb1">Inscrire Étudiant</a>

<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Nom</th>
        <th>Postnom</th>
        <th>Age</th>
        <th width="20%">Action</th>
    </tr>
    </thead>

    <tbody>
    <?php $i = 1; foreach ($req as $etudiant) : ?>
    <tr>
        <td class="text-center"><?= $i++; ?></td>
        <td><?php echo $etudiant->nom; ?></td>
        <td><?php echo $etudiant->postnom; ?></td>
        <td class="text-center"><?php echo $etudiant->age; ?> ans</td>
        <td>
            <a class='btn btn-warning'
               href="modifier.php?id=<?php echo $etudiant->id; ?>">Modifier</a>
            <a onclick="return confirm('Voulez-vous supprimer l\'étudiant')" class="btn btn-danger" href="index.php?id=<?php echo $etudiant->id; ?>">Supprimer</a>
        </td>
    </tr>
    <?php endforeach; ?>
    </tbody>

</table>

</body>
</html>