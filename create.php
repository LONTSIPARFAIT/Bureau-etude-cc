<?php 
require_once 'db.php';
$message = '';

function clean_input($data){

  return  htmlspecialchars(stripcslashes(trim($data)));
}

if (isset($_POST['create'])) {

  $libelle = clean_input($_POST['libelle']);
  $description = clean_input($_POST['description']);

  if ((empty($libelle)) || (empty($description)) ) {
     $message = "<p> Veuillez remplir tous les champs</p>";
  }else{

    $req = $pdo->prepare("INSERT INTO `produit`(`libelle`, `description`) VALUES (?,?) ");
    $req->execute([$libelle,$description]);

  
    echo "Produit inscrit avec succes";
    
    header('Location: index_produit.php');
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
    <h1>Ajouter un Produit</h1>


    <form action="" method="post">
        <label for="libelle">Libellé</label>
        <input type="text" name="libelle" id="libelle" required>
        <label for="description">Description du produit</label>
        <input type="text" name="description" id="description" required>
        <input type="submit" name="create" value="Ajouter">
        <?php echo $message; ?>
    </form>
    <a href="index_produit.php">Retour à la liste des produit</a>
        
</body>
</html>