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
        <title>Activation</title>
        <link rel="stylesheet" href="css/style1.css">
        <link rel = "shortcut icon" type = 'img/png' href="images/INSEA_logo.png" >  
        <link rel="stylesheet" href="css/nav.css">
    </head>
    <body>
                
    <div id='cssmenu'>
<ul>
   <li><a href='main.php'>INSEA</a></li>
   <li class='active' style="transform: translate(1625px,0%);"><a href='signin.php'>Se Connecter</a>
      
   </li>
   <li class='active' style="transform: translate(1350px,0%);"><a href='creecompte.php'>S'inscrire</a>
      
   </li>
   <li class='active' style="transform: translate(1050px,0%);"><a href='about.php'>Présentation</a>
      
   </li>
   <li class='active' style="transform: translate(750px,0%);"><a href='contact.php'>Contact</a>
      
   </li>
   
</ul>
</div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <h1 style="text-align:center">

            <?php echo $message;?>
        </h1>
    </body>
</html>






