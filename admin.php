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
        <!-- boutton pour revenir au formulaire -->
        <div class="form-style">
            <fieldset>
                <label><span> </span><a href="formulaire.php">Revenir au formulaire</a></label>
            </fieldset>

            <fieldset>
                <label><span> </span><a href="index.html">Revenir au CV</a></label>
            </fieldset>
        </div>
            <?php
                $servname = 'localhost';
                $dbname = 'contactMe';
                $user = 'root';
                $pass = 'root';

                // Créer une conexion
                $conn = new mysqli($servname, $user, $pass, $dbname);
                // verifier la connexion
                if ($conn->connect_error) {
                die("La connexion a échouée: " . $conn->connect_error);
                }

                echo '<table>';
                echo '<thead>';
                echo '<tr>';

                echo '<th>' .  'Prenom' . "</th>";
                echo '<th>' .  'Nom' . "</th>";
                echo '<th>' .  'Mail' . "</th>";
                echo '<th>' .  'Téléphone' . "</th>";
                echo '<th>' .  'Objet' . "</th>";
                echo '<th>' .  'Message' . "</th>";

                echo '</tr>';
                echo '</thead>';

                $sql = 'SELECT * FROM contacts';
                foreach ($conn->query($sql) as $row){

                    echo '<tbody>';
                    echo '<tr>';

                    echo '<td>' . $row['Name'] . "</td>";
                    echo '<td>' . $row['Surname'] . "</td>";
                    echo '<td>' . $row['Mail'] . "</td>";
                    echo '<td>' . $row['Phone'] . "</td>";
                    echo '<td>' . $row['Objet'] . "</td>";
                    echo '<td style="word-wrap: break-word">' . $row['Message'] . "</td>";
                    
                    echo '</tr>';
                    echo '</tbody>';

                }
                echo '</table>';
            ?>   
    </body>
</html>