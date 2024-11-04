<?php
require_once "./db.php";

$req= $pdo->prepare('SELECT * FROM nomenclature');
$req->execute();
$nomenclatures = $req->fetchAll(PDO::FETCH_ASSOC);



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des produit</title>
</head>
<body>
    <h1>Liste des nomenclatures</h1>
    <a href="./create_nomenclature.php">Ajouter une nouvelle nomenclature</a>
    <table>
        <thead>
            <tr>
                <th>Id_Produit</th>
                <th>ID_composant</th>
                <th>Quantité</th>
            </tr>
            </tr>
        </thead>
        <tbody>
            <?php foreach($nomenclatures as $nomenclature): ?>
                <tr>
                    <td><?= $nomenclature['id_produit'] ?></td>
                    <td><?= $nomenclature['id_composant'] ?></td>
                    <td><?= $nomenclature['quantite'] ?></td>
                    <td>
                        <a href="#">Voir nommenclature</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        </tbody>
    </table>

    
</body>
</html>