<?php
include("../db/connexion.php");

$requeteP = "SELECT * FROM plainte";
$resulP = $pdo->query($requeteP);

$plainte = $resulP->fetch();

$idplainte = $plainte['idP'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Messages | </title>
</head>

<body style="background: #efefef">
    <?php
    include("../include/hedaer.php")
    ?>

    <div class="container" style="margin-top: 100px;">
        <div class=""
            style="border: 1px solid silver; height: 80vh; border-radius: 5px; padding: 10px 40px;  background-color:#fff; box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.2);">

            <div class="msg"
                style='background-color: rgb(80, 80, 139); color: white; padding: 10px; border-radius:5px; margin-top:10px'>
                <h4>Nouvelle plainte <i class="fa fa-envelope-square"></i></h4>
            </div>

            <form method='POST' action="../back/msgTraitement.php">
                <div
                    style='margin-top: 20px; border:1px solid silver; padding:20px; border-radius:5px; margin-bottom:10px'>
                    <h5 style="border-bottom: 1px solid silver; margin-bottom:10px;">De :
                        <input type='text' disabled name="adresseEx" required
                            placeholder="Entrer l'objet de votre message" class=""
                            style="border: none; border: 0;outline: 0;padding: 1rem;height: 38px; width:70%"
                            value="<?php echo $_SESSION['user']['adresse_email'] ?>">
                    </h5>


                    <h5 style="border-bottom: 1px solid silver; margin-bottom:10px; ">A :
                        <input type='email' name="adressDest" required placeholder="Entrer l'adresse du déstinateur"
                            class="" style="border: none; border: 0;outline: 0;padding: 1rem;height: 38px;width:70%">
                    </h5>
                    <h5 style="border-bottom: 1px solid silver; margin-bottom:10px;">Objet :
                        <input type='text' name="objet" required placeholder="Entrer l'objet de votre message" class=""
                            style="border: none; border: 0;outline: 0;padding: 1rem;height: 38px; width:70%">
                    </h5>
                </div>

                <div style="border:1px solid silver; padding: 10px 20px; border-radius:5px">
                    <label for="plainte"> Sélectionner une plainte </label>
                    <select name="idP" class="form-control" id="plainte">
                        <?php while ($plainte = $resulP->fetch()) { ?>
                        <option value=" <?php echo $plainte['idP']; ?> " <?php
                                                                                if ($idplainte === $plainte['idP']) {
                                                                                    echo "selected";
                                                                                }
                                                                                ?>>
                            <?php echo $plainte['nom']; ?>
                        </option>
                        <?php } ?>
                    </select>

                    <div>
                        <textarea class="form-control" name="msgCont" style="height: 20vh; margin-top:15px"
                            placeholder="Ecrire un message"></textarea>
                    </div>


                </div>

                <button type="submit" class="btn btn-primary" style="margin-top:10px"><i class="fa fa-send"></i>
                    Envoyer</button>


        </div>
        </form>

    </div>
    </div>
    </div>
</body>

</html>