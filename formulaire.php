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
            <form method="post" class="formulaire">
                <fieldset><legend>Informations Personnels</legend>
                    <label for="field1"><span>Prenom <span class="required">*</span></span>
                        <input type="text" class="input" name="Name" placeholder="Prenom" required>
                    </label>

                    <label for="field2"><span>Nom <span class="required">*</span></span>
                        <input class="input" type="text" name="Surname" placeholder="Nom" required>
                    </label>

                    <label for="field3"><span>Mail <span class="required">*</span></span>
                        <input class="input" type="mail" name="mail" placeholder="Mail" required >
                    </label>

                    <label for="field4"><span>Numéro de téléphone <span class="required">*</span></span>
                        <input class="input" type="text" name="phone_number" placeholder="Numero de téléphone" required>
                    </label>

                    <label for="filed5"><span>Objet <span class="required">*</span></span>
                        <input class="Objet" type="text" name="Objet" placeholder="Objet" required>
                    </label>

                </fieldset>

                <fieldset><legend>Message</legend>
                    <label for="field6"><span>Message <span class="required">*</span></span>
                        <textarea class="textarea-field" name="message" placeholder="Message" max-length="200" required></textarea>
                    </label>
                    
                    <label><span> </span>
                        <input class="input" type="submit" name="envoyer" value="Envoyer" />
                    </label>
                    
                    <!-- rénitialise les données marqué dans le formulaire -->
                    <label><span> </span>
                        <input class="reset" type="reset" name="reset" placeholder="Reset">
                    </label>
                </fieldset>

                <!-- boutton pour se connecter à l'espace admin -->
                <fieldset>
                    <label><span> </span><a href="index.html">Revenir au CV</a></label>
                </fieldset>
                
                <fieldset>
                    <label><span> </span>
                        <a href="connexion.php">Se connecter à l'Espace Admin </a>
                    </label>
                </fieldset>
                
            </form>
        </div>

        <?php
            if($_POST){
                // variable importantes
                $servname = 'localhost';
                $user = 'root';
                $pass = 'root';
                $dbname = 'ContactMe';
                
                // creer la bdd dans phpmyadmin si elle n'existe pas
                try{
                    $dbco = new PDO("mysql:host=$servname", $user, $pass);
                    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                    $sql = "CREATE DATABASE IF NOT EXISTS ContactMe";
                    $dbco->exec($sql);
                    
                    echo '';
                }
                
                catch(PDOException $e){
                    echo "Erreur : " . $e->getMessage();
                }
                
                // creer la table dans la bdd si elle n'existe pas
                try{
                    $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
                    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                    $sql = "CREATE TABLE IF NOT EXISTS Contacts(
                            Id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                            Name VARCHAR(30) NOT NULL,
                            Surname VARCHAR(30) NOT NULL,
                            Mail VARCHAR(50) NOT NULL,
                            Phone VARCHAR(15) NOT NULL,
                            Objet VARCHAR(100) NOT NULL,
                            Message VARCHAR(100) NOT NULL,
                            DateInscription TIMESTAMP,
                            UNIQUE(Mail))";
                    
                    $dbco->exec($sql);
                    echo '';
                    echo "<br>";
                }
                
                catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
                } 
                
                // Créer une conexion
                $conn = new mysqli($servname, $user, $pass, $dbname);
                // verifier la connexion
                if ($conn->connect_error) {
                die("La connexion a échouée: " . $conn->connect_error);
                }
                
                // inserer les éléments rentré dans le formulaire par l'utilisateur
                $sql = "INSERT INTO Contacts(Name, Surname, Mail, Phone, Objet, Message) 
                        VALUES('$_POST[Name]', '$_POST[Surname]', '$_POST[mail]', '$_POST[phone_number]', '$_POST[Objet]', '$_POST[message]')";
                
                if ($conn->query($sql) === TRUE) {
                echo "";
                } else {
                echo "Erreur: " . $sql . "
                " . $conn->error;
                }
            }
        ?>
    </body>
</html>