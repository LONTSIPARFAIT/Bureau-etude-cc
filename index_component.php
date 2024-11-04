<?php
require_once "./db.php";

$req= $pdo->prepare('SELECT * FROM composant');
$req->execute();
$composants = $req->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des produit</title>
</head>
<body>
    <h1>Liste des composants</h1>
    <a href="./create_component.php">Ajouter un nouveau composant</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Libellé</th>
                <th>Description</th>
                <th>Cout</th>
            </tr>
            </tr>
        </thead>
        <tbody>
            <?php foreach($composants as $composant): ?>
                <tr>
                    <td><?= $composant['id'] ?></td>
                    <td><?= $composant['libelle'] ?></td>
                    <td><?= $composant['description'] ?></td>
                    <td><?= $composant['cout'] ?></td>
                    <td>
                        <a href="update_component.php?id=<?= $composant['id'] ?>">Modifié</a>
                        <a href="delete_component.php?id=<?= $composant['id'] ?>" onclick="confirm('Voulez-vous vraiment supprimer ce produit ?')">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        </tbody>
    </table>

    
</body>
</html>