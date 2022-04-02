<?php 
  include("connexionBd.php"); 
  if (isset($_POST['modifier'])){
  // Reacupuration du data 
    $name = htmlspecialchars(trim($_POST['nom']));
    $fname = htmlspecialchars(trim($_POST['prenom']));
    $mail = htmlspecialchars(trim($_POST['email']));
    $pasw = htmlspecialchars(trim($_POST['password']));
    $id = htmlspecialchars(trim($_POST['id']));
    

  // Insertion dans bd
  if($name && $fname && $mail && $pasw && $id){
    $query = "SELECT * FROM personnes WHERE id = '$id'";
    $result = mysqli_query($conn,$query);
      $num = mysqli_num_rows($result);
        if($num == 0){
            echo "<script>alert('n'existe pas cette id')</script>";
        }
        else{                           
                    // la requête
                        $query = "UPDATE personnes 
                        SET nom = '$name' ,prenom = '$fname',email = '$mail',password = '$pasw' 
                        WHERE id = '$id'";
                                            
                    // On envoie la requête
                    $result = mysqli_query($conn,$query);

                    // on ferme la connexion
                        mysqli_close($conn);
                                            
                        echo "<script>alert('Modification Avec Succe')</script>";                  
                }
                       
    }
    else echo "<script>alert('Veuillez saisir tous les champs !')</script>";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier</title>
    <link rel="stylesheet" href="style_ajouter.css">
</head>
<body>
<div class="formulaire">
        <h2 class="titre">Modifier : </h2>
        <form action="modifier.php"  method="post">
            <fieldset>
                <legend>Infos :</legend>
            <input class="text-area" type="text" name="id" placeholder= "id ?"><br/><br/>
            <input class="text-area" type="text" name="nom" placeholder= "nom ?"><br/><br/>

            <input class="text-area" type="text" name="prenom" placeholder="prénom ?" ><br/><br/>

            <input class="text-area" type="email" name = "email" placeholder="email ?"><br/><br/>

             <input class="text-area" type="password" name = "password" placeholder="Mot de passe ?"><br/><br/>

             <input type="submit" name="modifier" class = "btn"  value="Modifier">
            </fieldset><br/>
        </form>
        </div>

        <div class="retour">
            <a href="home.php">Retourner au home</a>
        </div>
        
        
</body>
</html>