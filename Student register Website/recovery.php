<?php

include "connect.php";

if(isset($_GET["code"])){
    $code=$_GET["code"];
    $sql = "SELECT checkcode,code From userinfo WHERE checkcode='non' AND code = '$code'";
    $rs = mysqli_query($con,$sql);
    $a = mysqli_num_rows($rs);
    if ($a == 1){
        $sql2= "UPDATE userinfo set checkcode = 'oui' WHERE code = '$code' ";
        mysqli_query($con,$sql2);
        $message = "Votre compte a ete activé avec succée";

    }else{
        $message =  "Ce compte a ete deja activé par mail";
    }


}
else{
    die("Error");
}

?>


<!DOCTYPE html>

<html>
    <head>
        <title>Changer le Mot de Passe</title>
        <link rel="stylesheet" href="css/style1.css">
        <link rel = "shortcut icon" type = 'img/png' href="images/INSEA_logo.png" >
    </head>
    <body>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <h1 style="text-align:center">

            <?php echo $message;?>
        </h1>
    </body>
</html>
