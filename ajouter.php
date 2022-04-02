
<?php 
  include("connexionBd.php"); 
  if (isset($_POST['ajouter'])){
  // Reacupuration du data 
    $name = htmlspecialchars(trim($_POST['nom']));
    $fname = htmlspecialchars(trim($_POST['prenom']));
    $mail = htmlspecialchars(trim($_POST['email']));
    $pasw = htmlspecialchars(trim($_POST['password']));
    $repeat_pasw = htmlspecialchars(trim($_POST['passwordR']));
    

  // Insertion dans bd
  if($name && $fname && $mail && $pasw){
    $query = "SELECT * FROM personnes WHERE email = '$mail'";
    $result = mysqli_query($conn,$query);
    if(true){
      $num = mysqli_num_rows($result);
        if($num == 1){
            echo "<script>alert('Deja existe')</script>";
        }
        else{
            if (strlen($pasw)>=6){
                if ($pasw == $repeat_pasw){
                    // On crypte le mot de passe
                        $pasw = md5($pasw);
                                            
                    // la requête
                        $query = "INSERT INTO personnes VALUES ('','$name','$fname','$mail','$pasw')";
                                            
                    // On envoie la requête
                    $result = mysqli_query($conn,$query);

                    // on ferme la connexion
                        mysqli_close($conn);
                                            
                        echo "<script>alert('Votre Compte a ete cree Avec Succe')</script>";                  
                }
                else
                    echo "<script>alert('Les mots de passe ne sont pas identiques')</script>";
            }
            else 
                echo "<script>alert('Le mot de passe est trop court !')</script>";
        }                          
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
    <title>Ajouter</title>
    <link rel="stylesheet" href="style_ajouter.css">
</head>
<body>
<div >
        <h1 style ="text-align : center;margin: 25px;font-family : arial;color:chartreuse;">
        Ajouter : </h1>
 </div>
<div class="formulaire">
       
        <form action="ajouter.php"  method="post">
            <fieldset>
                <legend>Info:</legend>
            <input class="text-area" type="text" name="nom" placeholder= "Votre nom ?"><br/><br/>

            <input class="text-area" type="text" name="prenom" placeholder="Votre prénom ?" ><br/><br/>

            <input class="text-area" type="email" name = "email" placeholder="Votre email ?"><br/><br/>

             <input class="text-area" type="password" name = "password" placeholder="Votre Mot de passe ?"><br/><br/>

             <input class="text-area" type="password" name = "passwordR" placeholder="ReTaper le mot de passe"><br/><br/>

             <input type="submit" name="ajouter" class = "btn"  value="Ajouter">
            </fieldset><br/>
        </form>
        </div>

        <div class="retour">
            <a href="home.php">Retourner au home</a>
        </div>
        
        
</body>
</html>