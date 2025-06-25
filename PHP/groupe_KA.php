<?php
    error_reporting(E_ALL);
    ini_set('display errors',1);

$servername = "localhost";
$username = "root";
$password = ""; 
try {
    $bdd = new PDO("mysql:host=$servername;dbname=parish online", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur :" . $e->getMessage();
}

if (isset($_POST["valider"])) {
    $nom = $_POST["nom"];
    $postnom = $_POST["postnom"];
    $prenom = $_POST["prenom"];
    $age = $_POST["age"];
    $telephone = $_POST["telephone"];
    $adresse = $_POST["adresse"];
    $classe = $_POST["classe"];
    $motivation = $_POST["motivation"];

    $requete = $bdd->prepare("INSERT INTO `groupe KA` VALUES (0, :nom, :postnom, :prenom, :age, :telephone, :adresse, :classe, :motivation)");
    $requete->execute(
        array(
            "nom" => $nom,
            "postnom" => $postnom,
            "prenom" => $prenom,
            "age" => $age,
            "telephone" => $telephone,
            "adresse" => $adresse,
            "classe" => $classe,
            "motivation" => $motivation
        )
    );
    echo "<script>alert('Membre ajouté avec succès');</script>";
    
}
