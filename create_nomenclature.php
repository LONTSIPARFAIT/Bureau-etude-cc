<?php 
require_once 'db.php';
$message = '';

function clean_input($data){

  return  htmlspecialchars(stripcslashes(trim($data)));
}

if (isset($_POST['create_nomenclature'])) {

  $id_produit = clean_input($_POST['id_produit']);
  $req_p = $pdo->prepare("SELECT * FROM produits WHERE id_produit = '$id_produit'");
  $req_p->execute();
  $produits = $req_p->fetch();

  $id_composant = clean_input($_POST['id_composant']);
  $req_c = $pdo->prepare("SELECT * FROM composants WHERE id_composant = '$id_composant'");
  $req_c->execute();
  $composants = $req_c->fetch();
  $quantite = clean_input($_POST['quantite']);

  if ($produits['id_produit'] == $id_produit && $composants['id_composant'] == $id_composant) {
      $message = "<p> Le produit existe déjà</p>";
    }else{
        $req = $pdo->prepare("INSERT INTO `nomenclature`(`id_produit`, `id_composant`, `quantite`) VALUES (?,?,?)");
        $req->execute();
        $message = "<p> La nomenclature a été créée avec succès</p>";
        
        header('Location: nomenclature.php');
        exit;


  }

//   if ((empty($id_produit)) || (empty($id_composant)) || (empty($quantite))) {
//      $message = "<p> Veuillez remplir tous les champs</p>";
//   }else{

//     $req = $pdo->prepare("INSERT INTO `nomenclature`(`id_produit`, `id_composant`, `quantite`) VALUES (?,?,?) ");
//     $req->execute([$id_produit,$id_composant,$quantite]);

  
//     echo "Produit inscrit avec succes";
    
//     header('Location: nomenclature.php');
//     exit;
//   }
  
  }


?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creer un Produit</title>
</head>
<body>
    <h1>Ajouter une nomenclature</h1>


    <form action="create_nomenclature.php" method="post">
        <label for="id_produit">Produit</label>
        <select name="id_produit" id="id_produit">
            <?php foreach ($produits as $produit) { ?>
                <option value="<?= $produit['id_produit']?>"><?= $produit['libelle']?></option>
            <?php } ?>
        </select>
        <label for="id_composant">Composant</label>
        <select name="id_composant" id="id_composant">
            <?php foreach ($composants as $composant) { ?>
                <option value="<?= $composant['id_composant']?>"><?= $composant['libelle']?></option>
                <?php } ?>
            </select>
            <label for="quantite">Quantité</label>
            <input type="number" name="quantite" id="quantite" required>
            <input type="submit" name="create_nomenclature" value="Ajouter">
    </form>
    <a href="nomenclature.php">Retour à la liste des nomenclatures</a>
        
</body>
</html>