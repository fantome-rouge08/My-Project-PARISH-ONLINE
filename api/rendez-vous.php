    <?php

    $servername = getenv('DB_HOST');
    $username = getenv('DB_USER');
    $password = getenv('DB_PASSWORD');
    $dbname = getenv('DB_NAME');
    try {
        $bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connexion reussie";
    } 
    catch (PDOException $e) {
            echo "Erreur :" . $e->getMessage();
    }

    if (isset($_POST["valider"])) {
            $nom = $_POST["nom"];
            $postnom = $_POST["postnom"];
            $prenom = $_POST["prenom"];
            $telephone = $_POST["telephone"];
            $date = $_POST["date"];
            $heure = $_POST["heure"];
            $objet=$_POST["objet"];

            $requete = $bdd->prepare("INSERT INTO rdv VALUES (0, :nom, :postnom, :prenom, :telephone, :date, :heure, :objet)");
            $requete->execute(
                array(
                "nom" => $nom,
                "postnom" => $postnom,
                "prenom" => $prenom,
                "telephone" => $telephone,
                "date" => $date,
                "heure" => $heure,
                "objet" => $objet
                )
            );
           echo "<script>alert('Rendez-vous pris avec succès');</script>";
        }

    ?>

