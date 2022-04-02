<?php
    include("connexionBd.php");
    if(isset($_POST['submit']))
    {
        
        $id = $_POST['id'];
        if($id){
            $query = "DELETE FROM personnes WHERE id = '$id' ";
	
	        $result = mysqli_query($conn,$query);         }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suprrimer</title>
    <link rel="stylesheet" href="style_liste.css">
    <link rel="stylesheet" href="style_supprimer.css">
</head>
<body>
<div class="Titre">
        <h1>Supprimer : </h1>
</div>
    </div>
        <div class="contenaire">
            <?php


                // Requête de selection

                $query = "SELECT * FROM personnes";
	
	            $result = mysqli_query($conn,$query);
	
	           

                //Afficher le résultat dans un tableau

                print("<table border = \" 0.5 \"  class=\"tableau \">");

                if($result){
                    print("<tr class = \"tete\">");
                    print("<td>"."id"."</td>");
                    print("<td>"."nom"."</td>");
                    print("<td>"."prenom"."</td>");
                    print("<tr>");
		            while($row = mysqli_fetch_array($result)){
                        print("<tr>");
                        print("<td>".$row['id']."</td>");
                        print("<td>".$row['nom']."</td>");
                        print("<td>".$row['prenom']."</td>");
                        print("<tr>");
		            }
	            }

                print("</table>");
            ?>
        </div>
        <form action="supprimer.php" method="POST">
             <input class="text-area" type="text"  name = "id" placeholder="Saisir id a supprimer">
             <input type="submit" name="submit"  class = "btn" value="Supprimer">
        </form>
        <div class="retour">
            <a href="home.php">Retourner au home</a>
        </div>
</body>
</html>