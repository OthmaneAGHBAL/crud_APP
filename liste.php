<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style_liste.css">
</head>
<body>
<div class="Titre">
        <h1>Liste : </h1>
    </div>
        <div class="contenaire">
            <?php

                include("connexionBd.php");

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
                    print("<td>"."email"."</td>");
                    print("<td>"."password"."</td>");
                    print("<tr>");
		            while($row = mysqli_fetch_array($result)){
                        print("<tr>");
                        print("<td>".$row['id']."</td>");
                        print("<td>".$row['nom']."</td>");
                        print("<td>".$row['prenom']."</td>");
                        print("<td>".$row['email']."</td>");
                        print("<td>".$row['password']."</td>");
                        print("<tr>");
		            }
	            }

                print("</table>");
            ?>
        </div>

        <div class="retour">
            <a href="home.php">Retourner au home</a>
        </div>
</body>
</html>