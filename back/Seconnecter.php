<?php
session_start();

include("../db/connexion.php");

$username = isset($_POST['username']) ? $_POST['username'] : "";
$password = isset($_POST['password']) ? $_POST['password'] : "";

$requete = "SELECT * FROM users WHERE username='$username' and password='$password'";

$resultat = $pdo->query($requete);

if ($user = $resultat->fetch()) {
    if ($user['statut'] == 1) {
        $_SESSION['user'] = $user;
        if ($_SESSION['user']['role'] == 'ADMIN') {
            header('location:../views/accueil.php');
        }
        if ($_SESSION['user']['role'] == 'visiteur') {
            header('location:../views/accueil.php');
        }
        if ($_SESSION['user']['role'] == 'ispt') {
            header('location:../section/ispt.php');
        }
    } else {
        $_SESSION['Erreurlogin'] = " <strong> Erreur !! </strong> Votre compte est désactivé. <br> Veuiller contacter l'Admin";
        header('location: ../views/login.php');
    }
} else {
    $_SESSION['Erreurlogin'] = " <strong> Erreur !! </strong> Nom d'utilisateur ou mot de passe incorrect.";
    header('location: ../views/login.php');
}