<?php
require_once "./db.php";

$req= $pdo->prepare('SELECT * FROM produit');
$req->execute();
$produits = $req->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des produit</title>
</head>
<body>
    <h1>Liste des produit</h1>
    <a href="./create.php">Ajouter un nouveau produit</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Libellé</th>
                <th>Description</th>
            </tr>
            </tr>
        </thead>
        <tbody>
            <?php foreach($produits as $produit): ?>
                <tr>
                    <td><?= $produit['id'] ?></td>
                    <td><?= $produit['libelle'] ?></td>
                    <td><?= $produit['description'] ?></td>
                    <td>
                        <a href="update.php?id=<?= $produit['id'] ?>">Modifié</a>
                        <a href="delete.php?id=<?= $produit['id'] ?>" onclick="confirm('Voulez-vous vraiment supprimer ce produit ?')">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        </tbody>
    </table>

    
</body>
</html>