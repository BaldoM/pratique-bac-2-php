<?php
if (!empty($_POST))
{

    $nom = $_POST['nom'];
    $postnom = $_POST['postnom'];
    $age = $_POST['age'];

    include_once 'include/db.php';

    $req = $cnx->prepare('INSERT INTO etudiants (nom, postnom, age) VALUES (:nom, :postnom, :age)');

    $req->execute([
        'nom' => $nom,
        'postnom' => $postnom,
        'age' => $age,
    ]);

    header('Location: index.php');

}
?>

<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inscription</title>

    <style>
        label {
            display: block;
            margin-bottom: 5px;
        }

        input {
            padding: 5px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<h2>Inscription d'un nouvel étudiant</h2>

<form action="" method="post">

    <div>
        <label for="nom">Nom</label>
        <input type="text" name="nom" id="nom" minlength="3" maxlength="45" required>
    </div>

    <div>
        <label for="postnom">Postnom</label>
        <input type="text" name="postnom" id="postnom" minlength="3" maxlength="45" required>
    </div>

    <div>
        <label for="age">Age</label>
        <input type="number" name="age" id="age" min="16" max="30" required>
    </div>

    <button type="submit">S'inscrire</button>
</form>
</body>
</html>
