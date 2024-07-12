<?php

include_once 'include/db.php';

if (!empty($_POST))
{
    $nom = $_POST['nom'];
    $postnom = $_POST['postnom'];
    $age = (int) $_POST['age'];
    $id = (int) $_POST['id'];

    $req = $cnx->prepare('UPDATE etudiants SET nom = :nom, postnom = :postnom, age = :age WHERE id = :id');

    $req->execute([
        'nom' => $nom,
        'postnom' => $postnom,
        'age' => $age,
        'id' => $id,
    ]);

    header('Location: index.php');

}

if (isset($_GET) && !empty($_GET['id'])) {
    $req = $cnx->prepare('SELECT * FROM etudiants WHERE id = :id');

    $req->execute([
        'id' => $_GET['id'],
    ]);

    $etudiant = $req->fetch();
}

?>

<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modification</title>

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
<h2>Modification de <?= $etudiant->nom . ' ' . $etudiant->postnom; ?></h2>

<form action="" method="post">

    <input type="hidden" name="id" value="<?php echo $etudiant->id; ?>">

    <div>
        <label for="nom">Nom</label>
        <input type="text" value="<?php echo $etudiant->nom; ?>" name="nom" id="nom" minlength="3" maxlength="45" required>
    </div>

    <div>
        <label for="postnom">Postnom</label>
        <input type="text" value="<?php echo $etudiant->postnom; ?>" name="postnom" id="postnom" minlength="3" maxlength="45" required>
    </div>

    <div>
        <label for="age">Age</label>
        <input type="number" value="<?php echo $etudiant->age; ?>" name="age" id="age" min="16" max="30" required>
    </div>

    <button type="submit">Modifier</button>
</form>
</body>
</html>
