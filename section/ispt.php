<?php

include("../db/connexion.php");

$requete = "SELECT * FROM msget";

$res = $pdo->query($requete);

$msgRec = "select count(*) countRec from msget";

$resultatRec = $pdo->query($msgRec);
$msgRecu = $resultatRec->fetch();
$nbrMsgRec = $msgRecu['countRec'];


$msgAtt = "select count(*) countAtt from msget WHERE statut=4";

$resultatAtt = $pdo->query($msgAtt);
$msgAtte = $resultatAtt->fetch();
$nbrMsgAtt = $msgAtte['countAtt'];

$msgRej = "select count(*) countRej from msgIspt WHERE statut=2";

$resultatRej = $pdo->query($msgRej);
$msgReje = $resultatRej->fetch();
$nbrMsgRej = $msgReje['countRej'];

$msgRep = "select count(*) countRep from msgIspt WHERE statut=1";

$resultatRep = $pdo->query($msgRep);
$msgRepo = $resultatRep->fetch();
$nbrMsgRep = $msgRepo['countRep'];

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

    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <?php include("../include/hedaer.php")
                        ?>
                    </div>
                    <div class="col-md-12" style="margin-top: 100px;">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="" style="border: 1px solid silver; height:20vh;
                                     text-align:center; margin-left:12px;
                                      padding-top:10px; box-shadow: 2px 2px 10px 2px rgba(1, 4, 1, 0.2)">
                                    Messages reçus
                                    <p>
                                        <i class="fa fa-envelope"></i>
                                    </p>
                                    <p style="font-size:25px">
                                        <?php echo $nbrMsgRec ?>
                                    </p>
                                    <p>
                                        <a href="ispt.php">
                                            Voir tout
                                        </a>
                                    </p>
                                </div>
                            </div>
                            <div class=" col-md-3">
                                <div class="" style="border: 1px solid silver; 
                                    height:20vh; text-align:center; 
                                    padding-top:10px; 
                                    box-shadow: 2px 2px 10px 2px rgba(1, 4, 1, 0.2)">
                                    Messages Répondus
                                    <p>
                                        <i class="fa fa-check"></i>
                                    </p>
                                    <p style="font-size:25px">
                                        <?php echo $nbrMsgRep ?>
                                    </p>
                                    <p>
                                        <a href="ispt.php?id=1">
                                            Voir tout
                                        </a>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="" style="border: 1px solid silver; height:20vh; 
                                    text-align:center; padding-top:10px; box-shadow: 2px 2px 10px 2px rgba(1, 4, 1, 0.2)">
                                    Messages Rejetés
                                    <p>
                                        <i class="fa fa-close"></i>
                                    </p>
                                    <p style="font-size:25px">
                                        <?php echo $nbrMsgRej ?>
                                    </p>
                                    <p>
                                        <a href="ispt.php?id=2">
                                            Voir tout
                                        </a>
                                    </p>
                                </div>
                            </div>
                            <div class=" col-md-3">
                                <div class="" style="border: 1px solid silver; 
                                    height:20vh; text-align:center; 
                                    padding-top:10px; box-shadow: 2px 2px 10px 2px rgba(1, 4, 1, 0.2)">
                                    Messages en attente...
                                    <p style="font-size:25px">
                                        <i class="fa fa-spinner"></i>
                                    </p>
                                    <p>
                                        <?php echo $nbrMsgAtt ?>
                                    </p>
                                    <p>
                                        <a href="ispt.php?id=4">
                                            Voir tout
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 container ">
                            <div class="" style="margin-top:10px !important">
                                <table class="table table-bordered table-striped ">
                                    <thead style=" border:1px solid silver">
                                        <tr>
                                            <?php
                                            if (!isset($_GET['rep'])) {
                                                echo "
                                                    <th>#</th>
                                                    <th>Contenu</th>
                                                    <th>Objet</th>
                                                    <th>Plainte</th>
                                                    <th>Date Réception</th>
                                                    <th>Actions</th>
                                                    ";
                                            }
                                            ?>
                                        </tr>
                                    </thead>
                                    <tbody style="border:1px solid silver; box-shadow: 2px 2px 18px rgba(1, 4, 1, 0.2)">
                                        <?php
                                        if (isset($_GET['id'])) {
                                            $id = $_GET['id'];

                                            $requeteM = "SELECT * FROM msget WHERE statut='$id'";
                                            $query = $pdo->query($requeteM);
                                        }
                                        ?>

                                        <?php
                                        if (!empty($id)) {  ?>
                                            <?php while ($res = $query->fetch()) { ?>

                                                <?php if ($res['statut'] == 2) { ?>
                                                    <tr style="border:1px solid silver">
                                                        <td><?php echo $res['id_et'] ?></td>
                                                        <td style="width: 30%;"><?php echo $res['content'] ?></td>
                                                        <td><?php echo $res['objet'] ?></td>
                                                        <td><?php echo $res['idP'] ?></td>
                                                        <td><?php echo $res['dateResp'] ?></td>
                                                        <td style="width:20%">
                                                            <button class="btn btn-info">Revoir <i class="fa fa-eye"></i></button>
                                                            <button class="btn btn-danger">Supprimer <i class="fa fa-close"></i></button>
                                                        </td>
                                                    </tr>
                                                <?php } else if ($res['statut'] == 1) { ?>
                                                    <tr>
                                                        <td><?php echo $res['id_et'] ?></td>
                                                        <td><?php echo $res['content'] ?></td>
                                                        <td><?php echo $res['objet'] ?></td>
                                                        <td><?php echo $res['idP'] ?></td>
                                                        <td><?php echo $res['dateResp'] ?></td>
                                                        <td style="width:10%">
                                                            <button class="btn btn-danger">Supprimer <i class="fa fa-close"></i></button>
                                                        </td>
                                                    </tr>
                                                <?php } else if ($res['statut'] == 4) { ?>
                                                    <tr>
                                                        <td><?php echo $res['id_et'] ?></td>
                                                        <td><?php echo $res['content'] ?></td>
                                                        <td><?php echo $res['objet'] ?></td>
                                                        <td><?php echo $res['idP'] ?></td>
                                                        <td><?php echo $res['dateResp'] ?></td>
                                                        <td style="width:10%">
                                                            <a href="ispt.php?rep=1&id_msg=<?php echo $res['id_et'] ?>">
                                                                <button class="btn btn-success">Répondre <i class="fa fa-check"></i></button>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php } else if ($res['statut'] !== 1 && $_GET['isset'] == 3) { ?>
                                                    <tr>
                                                        <td><?php echo $res['id'] ?></td>
                                                        <td><?php echo $res['content'] ?></td>
                                                        <td><?php echo $res['objet'] ?></td>
                                                        <td><?php echo $res['idP'] ?></td>
                                                        <td><?php echo $res['dateRec'] ?></td>
                                                        <td><?php echo $res['dateEnvoi'] ?></td>
                                                        <td><?php echo $res['exp'] ?></td>
                                                    </tr>
                                                <?php } ?>
                                            <?php } ?>
                                        <?php } else {
                                            if (!isset($_GET['rep'])) {
                                                echo "
                                                <tr>
                                                    <td colSpan='7px' style='text-align:center; padding:10px'>
                                                        Clique sur un élément pour plus de détail
                                                    </td>
                                                </tr>";
                                            } else {
                                                $rep = $_GET['id_msg'];
                                                echo $rep;

                                                $req = "SELECT * FROM msget WHERE id_et='$rep'";
                                                $queryM = $pdo->query($req);

                                                while ($resp = $queryM->fetch()) {
                                                    echo " <div class='col-md-12' style='border:1px solid silver; height:20vh; box-shadow: 2px 2px 18px silver; background:white'>
                                                    <div class='row'>
                                                        <h5 style='margin-left:12px'>Message <i class='fa fa-envelope-open'></i></h5>
                                                    </div>
                                                    </div>". $resp['content'];
                                                }
                                            }
                                        } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>