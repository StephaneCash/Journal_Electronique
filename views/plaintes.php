<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='../css/bootstrap.min.css'>
    <link rel="stylesheet" href='../css/font-awesome.min.css'>
    <title>Plaintes | ISPT</title>
</head>

<body style="background-color: #efefef">

    <?php
    include("../include/hedaer.php");

    include("../db/connexion.php");

    $requete = "SELECT * FROM plainte";

    $res = $pdo->query($requete);

    ?>

    <div class="container"
        style="box-shadow: 2px 2px 18px rgba(1, 0, 0, 0.2); height: 76vh; overflow: auto;margin-top:100px; border:1px solid silver">
        <h4 style="margin-top: 20px;">Liste de plaintes</h4>
        <a href="addPlainte.php">
            <button class="btn btn-primary" style="margin-top:10px"><i class="fa fa-plus"></i> Ajoouter une nouvelle
                plainte </button></a>
        <hr>
        <table class="table table-bordered table-striped">
            <thead style="background-color:#50508b; color:white">
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Date create</th>
                    <th>Date Modif</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($plainte = $res->fetch()) { ?>
                <tr>
                    <td><?php echo $plainte['idP'] ?></td>
                    <td><?php echo $plainte['nom'] ?></td>
                    <td><?php echo $plainte['dateCreate'] ?></td>
                    <td><?php echo "0:0:0:0:0" ?></td>
                    <td>
                        <button class="btn btn-info"><i class="fa fa-edit"></i></button>
                        <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</body>

</html>