<?php
require_once './db.php';

$id = $_GET['id'];

$req = $pdo->prepare('SELECT * FROM produit WHERE id = :id');
$req->execute(['id' => $id]);
$produit = $req->fetch();
// var_dump($produit);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $libelle = $_POST['libelle'];
    $description = $_POST['description'];

    $req = $pdo->prepare('UPDATE produit SET libelle = :libelle, description = :description WHERE id = :id');
    $req->execute([$libelle,$description,$id]);

    header('Location: index_produit.php');
    exit;
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Produit</title>
</head>
<body>
    <h1>Modifier un Produit</h1>
    <form action="update.php?id=<?php echo $id; ?>" method="post">
        <input type="hidden" name="id" value="<?= $produit['id'] ?>">
        <label for="libelle">Libellé</label>
        <input type="text" name="libelle" id="libelle" value="<?= $produit['libelle'] ?>">
        <label for="description">Description</label>
        <input type="text" name="description" id="description" value="<?= $produit['description'] ?>">
        <input type="submit" value="Modifier">
    </form>
    <a href="index_produit.php">Retour à la liste des produits</a>

    
</body>
</html>