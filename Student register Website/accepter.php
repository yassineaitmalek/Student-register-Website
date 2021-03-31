<?php 

include "connect.php";

if(isset($_GET["matricule"])){
    $matricule = $_GET["matricule"];
    $sql = "UPDATE userinfo SET etat = 'oui' WHERE matricule = '$matricule'";
    mysqli_query($con,$sql);

    header("Location: admin.php");

}


?>