<?php
require_once './db.php';

$id = $_GET['id'];

$req = $pdo->prepare('SELECT * FROM composant WHERE id = :id');
$req->execute(['id' => $id]);
$composant = $req->fetch();
// var_dump($composant);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $libelle = $_POST['libelle'];
    $description = $_POST['description'];
    $cout = $_POST['cout'];

    $req = $pdo->prepare('UPDATE composant SET libelle = :libelle, description = :description cout = :cout WHERE id = :id');
    $req->execute([$libelle,$description,$id,$cout]);

    header('Location: index_component.php');
    exit;
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un composant</title>
</head>
<body>
    <h1>Modifier un composant</h1>
    <form action="update_component.php?id=<?php echo $id; ?>" method="post">
        <input type="hidden" name="id" value="<?= $composant['id'] ?>">
        <label for="libelle">Libellé</label>
        <input type="text" name="libelle" id="libelle" value="<?= $composant['libelle'] ?>">
        <label for="description">Description</label>
        <input type="text" name="description" id="description" value="<?= $composant['description'] ?>">
        <label for="cout">Cout</label>
        <input type="number" name="cout" id="cout" value="<?= $composant['cout'] ?>">
        <input type="submit" name="update_component" value="Modifier">
    </form>
    <a href="index_component.php">Retour à la liste des composant</a>

    
</body>
</html>