<?php

include "connect.php";

$q =0;

function errorp($i){
    if($i == 1){
        echo  "<div style = 'background-color: #fce4e4; border: 1px solid #fcc2c3; float: left; padding: 20px 30px; transform: translate(210%,25%); height: 20px; width: 300px;' class='error_message'>
        <h2 style ='text-align: center;   color: #cc0033;font-family: Helvetica, Arial, sans-serif;font-size: 13px;font-weight: bold;line-height: 20px;text-shadow: 1px 1px rgba(250,250,250,.3);' class='error_text'>
       L'ancien mot de passe n'est pas valide
        </h2>
      </div>";
    }
    else if($i == 2){
        echo  "<div style = 'background-color: #fce4e4; border: 1px solid #fcc2c3; float: left; padding: 20px 30px; transform: translate(210%,25%); height: 20px; width: 300px;' class='error_message'>
        <h2 style ='text-align: center;   color: #cc0033;font-family: Helvetica, Arial, sans-serif;font-size: 13px;font-weight: bold;line-height: 20px;text-shadow: 1px 1px rgba(250,250,250,.3);' class='error_text'>
        Le nouveau mot de passe n'est pas confirmé
        </h2>
      </div>";
    }
    else if($i == 3){
        echo "<div style = 'background-color: #fce4e4; border: 1px solid #fcc2c3; float: left; padding: 20px 30px; transform: translate(210%,25%); height: 20px; width: 300px;' class='error_message'>
        <h2 style ='text-align: center;   color: #cc0033;font-family: Helvetica, Arial, sans-serif;font-size: 13px;font-weight: bold;line-height: 20px;text-shadow: 1px 1px rgba(250,250,250,.3);' class='error_text'>
        Le mot de passe est court
        </h2>
      </div>";
    }
    else{
        echo"";
    }

}

session_start();

if (isset($_SESSION['user'])){
    $email = $_SESSION['user'];
}
$sql = "SELECT pass FROM userinfo Where email = '$email' ";
$rs = mysqli_query($con,$sql);
$a = mysqli_num_rows($rs);

$row = mysqli_fetch_assoc($rs);
if (isset($_POST["change"])){

    $op = $_POST['op'];
    $np = $_POST['np'];
    $cnp=$_POST['cnp'];

    if($op == $row['pass'] ){
        if($cnp == $np){
            if(strlen($np)>8){
                 $sql1= "UPDATE userinfo set pass = '$np' WHere email ='$email'";
                  mysqli_query($con,$sql1);
                    header("location:singin.php");
            }else{
               $q=3;
            }
           

        }else{
            $q=2;
        }
    }else{
            $q=1;
    }
}



?>

<!DOCTYPE html>
<html>
<head>
<title>Changer le MDP</title>
<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel = "shortcut icon" type = 'img/png' href="images/INSEA_logo.png" >
</head>
<body>
<div id='cssmenu'>
<ul>
   <li><a href='loggedin.php'>INSEA</a></li>
   <li class='active' style="transform: translate(1625px,0%);"><a href='#'>Paramétres</a>
      <ul>
               <li><a href='changepass.php?email=<?php echo $email;?>'>Changer le Mot de Passe</a></li>
               <li><a href='about.php'>About</a></li>
                <li><a href='contact.php'>Contact</a></li>
               <li><a href='signout.php'>Se Déconnecter </a></li>
         
      </ul>
   </li>
   
</ul>
</div>

<?php   errorp($q) ?>



    <div class="log" style="box-shadow: 0px 35px 50px rgba( 0, 0, 0, 0.2 );">
    <img src="images/INSEA_logo.png" height="90px" width="90px" align="center" class="avatar">
        <form method='post' action="<?php  echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
        <h3 class="type">Ancien Mot de passe </h3>
        <input type="password" placeholder="Entrer l'Ancien MDP"  name='op' required autofocus class="box">
        <h3 class="type">Nouveau Mot de passe</h3>
        <input type="password" placeholder="Entrer le Nouveau MDP" name='np' required autofocus class="box">
        <h3 class="type">Confirmer le Nouveau Mot de passe</h3>
        <input type="password" placeholder="Confirmer le Nouveau MDP" name ='cnp' required autofocus class="box">
        
        <input type="submit" value='Changer' name='change' class='bt' >
        
        </form>
    
    
    
    
    
    
    
    
    
    
    </div>
</body>



</html>
