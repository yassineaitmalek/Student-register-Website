<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Contact</title>
<link rel="stylesheet" href="css/style3.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel = "shortcut icon" type = 'img/png' href="images/INSEA_logo.png" >
</head>
<body>
<?php 

    if (isset($_SESSION["user"])){
        $email = $_SESSION['user'];
        echo "<div id='cssmenu'>
<ul>
   <li><a href='loggedin.php'>INSEA</a></li>
   <li class='active' style='transform: translate(1625px,0%);'><a href='#'>Paramétres</a>
      <ul>
               <li><a href='changepass.php?email=".$email."'>Changer le Mot de Passe</a></li>
               <li><a href='about.php'>About</a></li>
                <li><a href='contact.php'>Contact</a></li>
               <li><a href='signout.php'>Se Déconnecter </a></li>
         
      </ul>
   </li>
   
</ul>
</div>";
    }
    else{
        echo "
        <div id='cssmenu'>
        <ul>
           <li><a href='main.php'>INSEA</a></li>
           <li class='active' style='transform: translate(1625px,0%);'><a href='signin.php'>Se Connecter</a>
              
           </li>
           <li class='active' style='transform: translate(1350px,0%);'><a href='creecompte.php'>S'inscrire</a>
              
           </li>
           <li class='active' style='transform: translate(1050px,0%);'><a href='about.php'>Présentation</a>
              
           </li>
           <li class='active' style='transform: translate(750px,0%);'><a href='contact.php'>Contact</a>
              
           </li>
           
        </ul>
        </div>
        
        
        
        
        
            
        
                <br><br>"
        ;
    }

?>




    <div class="lg2" style="box-shadow: 0px 35px 50px rgba( 0, 0, 0, 0.2 );">
    <img src="images/INSEA_logo.png" height="90px" width="90px" align="center" class="avatar">
    <h2 align="center" class="title">Contact</h2>
    <p>
    <a href="https://www.google.fr/maps/place/Institut+National+de+Statistique+et+d'Economie+Appliqu%C3%A9e/@33.984359,-6.8615832,15z/data=!4m2!3m1!1s0x0:0x877696d1bf2ecee6" target="_blank">
            <img src="images/maps.jpg"  alt="Image de contact" align="center" class="img">			
        </a>
       <h2 align="center" class="title1">Institut National de Statistique et d'Economie Appliquée</h2> 
       <h2 align="center" class="title1">Rabat-Instituts</h2>   
       <h2 align="center" class="title1"> Rabat</h2>      
       <h2 align="center" class="title1">B.P. 6217</h2>    
       <h2 align="center" class="title1"> Maroc</h2> 
       <h2 align="center" class="title1"> Tel: (212) 05 37 77 48 59/60 </h2>

       <h2 align="center" class="title1">Fax: (212) 05 37 77 94 57 </h2>        
       <h2 align="center" class="title1"><a align="center" href="http://www.insea.ac.ma/" >Site Officel </a> </h2> 
    </p>
    
    </div>
</body>



</html>