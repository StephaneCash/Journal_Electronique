<?php
session_start();
if (isset($_SESSION['Erreurlogin']))
    $erreurLogin = $_SESSION['Erreurlogin'];
else {
    $erreurLogin = "";
}
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <title>Login | Admin </title>
    <link rel="stylesheet" href="../css/login.css">
</head>

<style>

</style>

<body>

    <div class="main-container">
        <div class="iconText">
            <i class="fa fa-user-o icon" style="text-align: center;"></i>

        </div>

        <h4 style="text-align: center">Connectez-vous</h4>

        <form method="POST" action="../back/Seconnecter.php">

            <?php if (!empty($erreurLogin)) { ?>
            <div class="alert alert-danger">
                <?php echo $erreurLogin; ?>
            </div>
            <?php } ?>

            <div class="form-group">
                <label>Entrer votre username ou adresse email</label>
                <input type="text" class="form-control" name="username" id="">
            </div>

            <div class="form-group">
                <label>Entrer votre password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <input class="btn btn-primary" type="submit" value="Se connecter">
        </form>
    </div>
</body>

</html>