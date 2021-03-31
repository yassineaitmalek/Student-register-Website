<?php 

include "connect.php";

if(isset($_GET["matricule"])){
    $matricule = $_GET["matricule"];
    $sql = "SELECT * from userdata  where matricule = '$matricule'";
    $rs0 = mysqli_query($con,$sql);
    $row0 = mysqli_fetch_assoc($rs0);
    $sql0 = "SELECT filiere from userinfo where matricule = '$matricule'";
    $rs1 = mysqli_query($con,$sql0);
    $row1 = mysqli_fetch_assoc($rs1);
    $filiere = $row1["filiere"];
    $fil = str_replace(" ","",$filiere);
    $sql1 = "DELETE FROM userinfo WHERE matricule = '$matricule'";
    mysqli_query($con,$sql1);
    $sql2 = "DELETE FROM userdata WHERE matricule = '$matricule'";
    mysqli_query($con,$sql2);

    unlink($row0["photo"]);
    unlink($row0["copie_cin"]);
    unlink($row0["copie_baccalaureat"]);
    unlink($row0["attestation_reussite"]);

    rmdir('up/'.$fil."/".$matricule);
    
    header("Location: admin.php");


}


?>