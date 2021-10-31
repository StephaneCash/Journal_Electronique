<?php
session_start();

$adresseDest = $_SESSION['user']['adresse_email'];

include("../db/connexion.php");

$adresseEx = isset($_POST['adresseEx']) ? $_POST['adresseEx'] : ""; // Adresse de l'expéditeur 
$idP = isset($_POST['idP']) ? $_POST['idP'] : "";                   // Plainte 
$dest = isset($_POST['destinateur']) ? $_POST['destinateur'] : "";  // Adresse du déstinateur
$obj = isset($_POST['objet']) ? $_POST['objet'] : "";              // Objet du message
$msgCont = isset($_POST['msgCont']) ? $_POST['msgCont'] : "";      // Message
$dateEnvoi = date("Y-m-d  H  : i"); // Date envoi
$dateResp = "0:0:0:0:0";
$adressDest = isset($_POST['adressDest']) ? $_POST['adressDest'] : "";
$statut = 0;

$requete = "insert into msgIspt(content, objet, idP,dateRec , dateEnvoi, exp, dest, statut) values(?,?,?,?,?,?,?, ?)";

$result = array($msgCont, $obj, $idP, $dateResp, $dateEnvoi, $adresseDest, $adressDest, $statut);

$resulMsg = $pdo->prepare($requete);

$resulMsg->execute($result);

if ($resulMsg) {
    echo "<div class=' container alert alert-success' style='margin-top:20px'> Votre message a été envoyé avec succès, cliquer <a href='../views/accueil.php'>Ici</a> pour voir vos messages</div>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>msgTraitement</title>
    <link rel="stylesheet" href='../css/bootstrap.min.css'>
</head>

<body>

</body>

</html>