<?php 
require_once 'db.php';
$message = '';

function clean_input($data){

  return  htmlspecialchars(stripcslashes(trim($data)));
}

if (isset($_POST['create_component'])) {

  $libelle = clean_input($_POST['libelle']);
  $description = clean_input($_POST['description']);
  $cout = clean_input($_POST['cout']);

  if ((empty($libelle)) || (empty($description)) ) {
     $message = "<p> Veuillez remplir tous les champs</p>";
  }else{

    $req = $pdo->prepare("INSERT INTO `composant`(`libelle`, `description`,`cout`) VALUES (?,?,?) ");
    $req->execute([$libelle,$description,$cout]);

  
    echo "Composant ajouter avec succes";
    
    header('Location: index_component.php');
    exit;
  }
  
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
    <h1>Ajouter un Composant</h1>


    <form action="" method="post">
        <label for="libelle">Libellé</label>
        <input type="text" name="libelle" id="libelle" required>
        <label for="description">Description du produit</label>
        <input type="text" name="description" id="description" required>
        <label for="cout">Cout</label>
        <input type="number" name="cout" id="cout" required>
        <input type="submit" name="create_component" value="Ajouter">
    </form>
    <a href="index_component.php">Retour à la liste des Composant</a>
        
</body>
</html>