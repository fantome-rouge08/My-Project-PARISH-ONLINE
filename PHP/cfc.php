    <?php

    $servername="localhost";
    $username="root";
    $passeword="";
    try {
        $bdd = new PDO("mysql:host=$servername;dbname=parish online", $username, $passeword);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connexion reussie";
    } 
    catch (PDOException $e) {
            echo "Erreur :" . $e->getMessage();
    }

    if (isset($_POST["valider"])) {
            $nom = $_POST["nom"];
            $postnom = $_POST["postnom"];
            $prenom = $_POST["prenom"];
            $age = $_POST["age"];
            $telephone = $_POST["telephone"];
            $adresse = $_POST["adresse"];
            $motivation = $_POST["motivation"];

            $requete = $bdd->prepare("INSERT INTO cfc VALUES (0, :nom, :postnom, :prenom, :age, :telephone, :adresse, :motivation)");
            $requete->execute(
                array(
                "nom" => $nom,
                "postnom" => $postnom,
                "prenom" => $prenom,
                "age" => $age,
                "telephone" => $telephone,
                "adresse" => $adresse,
                "motivation" => $motivation
                )
            );
            echo "<script>alert('Membre ajouté avec succès');</script>";
        }

    ?>

