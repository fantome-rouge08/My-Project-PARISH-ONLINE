    <?php
    error_reporting(E_ALL);
    ini_set('display errors',1);
    
    $servername="localhost";
    $username="root";
    $passeword="";
    try {
        $bdd = new PDO("mysql:host=$servername;dbname=parish-rdv", $username, $passeword);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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

            $requete = $bdd->prepare("INSERT INTO rdv VALUES ( :nom, :postnom, :prenom, :telephone, :date, :heure, :objet)");
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

