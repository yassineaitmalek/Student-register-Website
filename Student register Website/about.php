<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>Présentation</title>
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


    <div class="lg" style="box-shadow: 0px 35px 50px rgba( 0, 0, 0, 0.2 );">
    <img src="images/INSEA_logo.png" height="90px" width="90px" align="center" class="avatar">
    <h2 align="center" class="title">Présentation</h2>
    <p>
    Créé en 1961 sous l’appellation « Centre de formation des ingénieurs des travaux de la statistique », la dénomination Institut National de Statistique et d’Economie Appliquée (INSEA) a été adoptée en 1967 en application du Décret Royal n° 532-67. Ce Décret a été modifié et complété, notamment par le Décret n° 2-99-804 du 6 Chaoual 1420 (13 janvier 2000).

- Jusqu'en 1974, L'INSEA se limitait à la formation des ingénieurs d'application de la statistique en trois ans et des adjoints techniques en deux ans mais depuis cette date, et compte tenu des besoins importants dans le domaine de l'informatique, l'Institut a introduit un cycle de formation des Ingénieurs Analystes et un cycle de Programmeurs. L'INSEA devient, de ce fait, le premier établissement supérieur au Maroc à former des cadres en informatique. L'INSEA engloba dès lors, quatre cycles de formation.
 
- En 1983, un cycle supérieur de formation d'Analyste Concepteur et un autre de Statisticien-Démographe ont été introduits. Cette année a connu aussi l'allongement de la durée de formation des ingénieurs d'application à quatre ans au lieu de trois ans et ce, par souci d'améliorer le niveau de cette formation.
 
- En 1990, l'INSEA a mis fin à la formation des cadres moyens (Adjoints Technique et Programmeurs) pour des raisons d'insertion dans le monde du travail et des difficultés liées à la gestion de ce type de formation 
 
- En 1995, l'INSEA a opéré un changement majeur dans son système d'enseignement en offrant une formation, sur trois ans, menant à un diplôme d'Ingénieur d'Etat de l'INSEA. 
 
- A partir de 2011, la formation à l'INSEA est organisée en 3 cycles: Cycle Ingénieur, Cycle du Master, et Cycle de Doctorat.
    </p>
    
    </div>
</body>



</html>