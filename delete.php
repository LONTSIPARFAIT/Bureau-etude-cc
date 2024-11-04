<?php
require_once './db.php';


if(isset($_GET['id'])){
    $id = $_GET['id'];
    $req = $pdo->prepare("DELETE FROM `produit` WHERE `id` = ?");
    $req->execute([$id]);
    if($req){
        header("Location: index_produit.php");
    }
    else{
        echo "Erreur lors de la suppression";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suppression d'un Produit</title>
</head>
<body>

    
</body>
</html>

