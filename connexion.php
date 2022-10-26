<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body class="backgroundphp">
        <div class="form-style"> 
            <form class="formulaire" method="post">
                <fieldset><legend>Code Admin</legend>

                    <label for="field1"><span>Prenom <span class="required">*</span></span>
                    <input type="text" class="input" name="Name" placeholder="Prenom" required></label>

                    <label for="field2"><span>Nom <span class="required">*</span></span>
                    <input class="input" type="text" name="Surname" placeholder="Nom" required></label>
                    
                    <label><span> </span><input class="input" type="submit" name="envoyer" value="Envoyer" /></label>
                        
                    <label><span> </span><input class="reset" type="reset" name="reset" placeholder="Reset"></label>
                </fieldset>
            </form>
        </div>

        <?php
            $servname = 'localhost';
            $dbname = 'ContactMe';
            $user = 'root';
            $pass = 'root';

            // Créer une conexion
            $conn = new mysqli($servname, $user, $pass, $dbname);
            // verifier la connexion
            if ($conn->connect_error) {
            die("La connexion a échouée: " . $conn->connect_error);
            }
            // sectionne toutes les données de la table "contacts"
            $sql = 'SELECT * FROM Contacts'; 
            if ($_POST){

                // si l'identifiant admin n'est pas "Campus Gtech" alors vous n'avez pas accès au pannel admin
                if ($_POST["Name"] == 'Campus' and $_POST["Surname"] == 'Gtech') { 
                    
                    echo '<div class="form-style">';
                    echo '<fieldset>';

                    echo 'Bienvenue, Mr '. $_POST["Name"] . ' ' . $_POST["Surname"] . ' rendez-vous sur le ';
                    echo '<a href="admin.php">PANNEL ADMIN</a></button> pour voir la base de donnée !';

                    echo '</fieldset>';
                    echo '<div>';
                }
            }
            ?>
    </body>
</html>