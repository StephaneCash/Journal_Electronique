<?php

include("../db/connexion.php");

$requete = "SELECT * FROM msgIspt";

$res = $pdo->query($requete);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Accueil</title>
</head>

<style>
* {
    font-family: Segoe UI;
}
</style>

<body style="background-color: #efefef">
    <?php include("../include/hedaer.php")
    ?>

    <main class="">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <h4 style="margin-top: 100px; border:1px solid #8d8d8d; padding:10px">Messages <i
                            class="fa fa-envelope" style='color:green'></i></h4>

                    <hr>
                    </hr>

                    <div style="box-shadow: 2px 2px 18px rgba(0, 0, 0, 0.2); height: 72vh; overflow: auto;">
                        <table class="table table-bordered table-striped">
                            <thead style="background-color:#50508b; color:white">
                                <tr>
                                    <th>#</th>
                                    <th>Message</th>
                                    <th>Expéditeur</th>
                                    <th>Statut</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($msg = $res->fetch()) { ?>
                                <tr>
                                    <td> <?php echo $msg['id_sec'] ?> </td>
                                    <td> <?php
                                                $content = $msg['content'];
                                                $sub = substr($content, 0, 10);
                                                echo $sub . "...";
                                                ?>
                                    </td>
                                    <td>ISPT</td>
                                    <td><?php
                                            if ($msg['statut'] == 0) {
                                                echo "En attente";
                                            } else if ($msg['statut'] == 1) {
                                                echo "Rejeté";
                                            } else if ($msg['statut'] == 2) {
                                                echo "Répondu";
                                            }
                                            ?></td>
                                    <td>
                                        <?php
                                            if ($msg['statut'] == 0) {
                                                echo "<button class='btn btn-warning'> <i class='fa fa-spinner fa-spin'></i></button>";
                                            } else if ($msg['statut'] == 1) {
                                                echo "<button class='btn btn-danger'> <i class='fa fa-close'></i></button>";
                                            } else if ($msg['statut'] == 2) {
                                                echo "<a href='accueil.php?id=" . $msg['id_sec'] . "'>
                                                    <button class='btn btn-success'> <i class='fa fa-eye'></i></button> </a>";
                                            }
                                            ?>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <h4
                        style="margin-top: 100px; border:1px solid #8d8d8d; padding:10px; font-size:17px; font-family:Segoe UI">
                        Détails</h4>

                    <hr>
                    </hr>
                    <?php
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];

                        $req = "SELECT * FROM msgIspt WHERE id_sec='$id'";

                        $resp = $pdo->query($req);

                        $num = "SELECT count(*) countN FROM msgIspt WHERE id_sec='$id'";

                        $resCount = $pdo->query($num);

                        $numbr = $resCount->fetch();
                    }
                    ?>


                    <?php
                    if (!empty($numbr)) { ?>
                    <?php while ($msgR = $resp->fetch()) { ?>
                    <div style="border:1px solid #8d8d8d; height:auto">
                        <div class="col-md-6">
                            <h5>De : <?php echo $msgR['dest'] ?></h5>
                        </div>
                        <div class="col-md-6">
                            <h5>Date de réponse : <?php echo $msgR['dateRec'] ?></h5>
                        </div>
                        <div style="border-bottom:1px solid silver; height: 45px;"></div>
                        <div class="col-md-12">
                            <h5 style=" padding:5px; font-family:Segoe UI;">
                                Message <i class="fa fa-envelope-open"></i>
                                :
                            </h5>
                            <h5 style=" padding:15px;height: auto; font-family:Segoe UI; border:1px solid silver">
                                <?php echo $msgR['content'] ?></h5>
                            <hr>


                        </div>
                        <div style="border:1px solid silver; height:70px">

                            <button class="btn btn-danger" style="float:right; margin-top:10px; margin-right:14px"><i
                                    class="fa fa-trash"></i> Supprimer</button>
                        </div>
                    </div>
                    <?php } ?>
                    <?php } ?>
                    <?php
                    if (empty($numbr)) {
                        echo
                        "
                        <div style='border:1px solid silver; height:auto; padding:10px; text-align:center'>
                            Cliquer sur le bouton Voir le détail <i class='fa fa-eye'></i>
                        </div>";
                    }
                    ?>

                </div>
            </div>
        </div>

    </main>
</body>

</html>