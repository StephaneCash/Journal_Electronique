<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap-theme.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <title>Document</title>
</head>

<body>

    <style>
    .navbar {
        min-height: 80px;
        font-size: 17px;
        padding: 10px;
        color: white !important;
        font-family: Segoe UI;
    }
    </style>

    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="accueil.php" class="navbar-brand" title="Journal éléctroniquen de  l'ISPT-KIN">
                    <span class="glyphicon glyphicon-home small"> </span>
                    Journal Electronique de plaintes
                </a>
            </div>

            <ul class="nav navbar-nav">

                <li><a href="plaintes.php" title="Plaintes">Plaintes</a></li>

                <li><a href="msg.php" title="Ecrire à la section">Journal</a></li>

                <li><a href="historique.php" title="Historique Stagiaires " active><i class="fa fa-history"></i>
                        Historique</a></li>
                </li>


                <li><a href="users.php" title="Users">Utilisateurs</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li> <a href="#" title="User"><?php echo $_SESSION['user']['noms'] ?> <i
                            class='glyphicon glyphicon-user '> </i> </a></li>
                <li><a href="../back/Sedeconnecter.php" title="Déconnexion"><i class='glyphicon glyphicon-log-out '></i>
                        Déconnexion</a></li>
            </ul>
        </div>
    </nav>

</body>

</html>