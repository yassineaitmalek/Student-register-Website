<?php include "connect.php" ;


function errorp($i){
    if($i == 1){
        echo "<div style = 'background-color: #FFFF99; border: 1px solid #fcc2c3; float: left; padding: 20px 30px; transform: translate(210%,25%); height: 20px; width: 300px;' class='error_message'>
        <h2 style ='text-align: center;   color: #666600;font-family: Helvetica, Arial, sans-serif;font-size: 13px;font-weight: bold;line-height: 20px;text-shadow: 1px 1px rgba(250,250,250,.3);' class='error_text'>Votre compte n'est pas activé par l'Email</h2>
      </div>";
    }
    else if($i == 2){
        echo  "<div style = 'background-color: #ABEBC6; border: 1px solid #fcc2c3; float: left; padding: 20px 30px; transform: translate(210%,25%); height: 20px; width: 300px;' class='error_message'>
        <h2 style ='text-align: center;   color: #239B56 ;font-family: Helvetica, Arial, sans-serif;font-size: 13px;font-weight: bold;line-height: 20px;text-shadow: 1px 1px rgba(250,250,250,.3);' class='error_text'>Votre compte n'est pas activé par l'Admin</h2>
      </div>";
    }
    else if($i == 3){
        echo "<div style = 'background-color: #fce4e4; border: 1px solid #fcc2c3; float: left; padding: 20px 30px; transform: translate(210%,25%); height: 20px; width: 300px;' class='error_message'>
        <h2 style ='text-align: center;   color: #cc0033;font-family: Helvetica, Arial, sans-serif;font-size: 13px;font-weight: bold;line-height: 20px;text-shadow: 1px 1px rgba(250,250,250,.3);' class='error_text'>Le Mot de Passe ou l'Email est incorrect</h2>
      </div>";
    }
    else{
        echo "";
    }
}
$b=0;
if (isset($_POST['connecter'])){

    $e=$_POST['email'];
    $p=$_POST['pass'];

    
    $sql = "SELECT email,pass,etat,admin,checkcode
    FROM userinfo 
    WHERE email = '$e' AND pass = '$p'";
	$rs = mysqli_query($con, $sql);
    
    $a = mysqli_num_rows($rs);
    $row = mysqli_fetch_assoc($rs);
    if($a == 1 && $row['etat']=='oui' && $row['admin']=='non' && $row["checkcode"]=='oui' ){
        session_start();
        $_SESSION['user'] = $e;
        header("location: loggedin.php");
    }
    else if($a == 1 && $row['admin']=='oui'){
        session_start();
        $_SESSION['user'] = $e;
        header("location: admin.php");
    }
    else if($a == 1 &&  $row['admin']=='non' && $row["checkcode"]=='non'){
       $b=1;

    }
    else if ($a == 1 && $row['etat']=='non'&& $row['admin']=='non' && $row["checkcode"]=='oui'){
        $b=2;
        
    }
    
    
    else{
        $b=3;
    }
   

}


?>





<!DOCTYPE html>
<html>
    <head>
        <title>Se conncecter</title>
        <link rel="stylesheet" href="css/style.css">
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

<?php   errorp($b) ?>



    

        <br><br>
        
        <div class="log" style="box-shadow: 0px 35px 50px rgba( 0, 0, 0, 0.2 );">
            <form method="post" action="<?php  echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
            <img src="images/INSEA_logo.png" height="90px" width="90px" align="center" class="avatar">
                <h2 align="center" class="title">Connectez-vous</h2>
                <br>
                



                <h2 class="type"> Email </h2>
                
               

                <input type="text" placeholder="Entrer votre email" name="email" required autofocus class="box">
              

                    <br><br>

                <h2 class="type">Mot de Passe </h2>
               

                <input type="password" placeholder="Entrer votre mot de passe" name="pass" required class="box">
               
                <input type="submit" value="Connecter" name="connecter" class="bt">
                
            </form>
            <br><br><br><br><br><br><br><br><br>
            <a style='text-decoration:none'  href="creecompte.php"  ><h1  class="link" >Vous n&#39avez pas de compte ?</h1></a>
            <br><br>
            

        </div>
        
    </body>
</html>
