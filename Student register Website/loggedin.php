<?php
include "connect.php";
session_start();


if (isset($_SESSION['user'])){
  $email = $_SESSION['user'];
  $k = explode('@',$email);
  
  $p = explode('.',$k[0]);
 
}


?>


<!DOCTYPE html>
<html>
    <head>
    <title>Votre Espace</title>
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel = "shortcut icon" type = 'img/png' href="images/INSEA_logo.png" >
    </head>
    <body>
    
    <div id='cssmenu'>
<ul>
   <li><a href='loggedin.php'>INSEA</a></li>
   <li class='active' style="transform: translate(1625px,0%);"><a href='#'>Paramétres</a>
      <ul>
               <li><a href='changepass.php'>Changer le Mot de Passe</a></li>
               <li><a href='about.php' >Présentation</a></li>
                <li><a href='contact.php' >Contact</a></li>
               <li><a href='signout.php'>Se Déconnecter </a></li>
         
      </ul>
   </li>
   
</ul>
</div>





    

        <br><br>
        <img style='display: block;margin-left: auto;margin-right: auto;' src="images/INSEA_logo.png" height="90px" width="90px" align="center" class="avatar">

        <br><br><br>
      <h3 align="center">Bonjour <?php echo $p[0].' '.$p[1];?>
        <br><br><br>
        <h3 align="center">Le site n'est pas complet c'est un test de Log in </h3>
        <br><br>
        <h3 align="center">Voici votre Données</h2>


        <div class="table-wrapper">
         
            

            <br><br>
      	<table  cellspacing="0" border="1" class="fl-table">
      		<thead>
      			<tr>
                  <th> Matricule</th>
      				
                    
                    <th> Nom</th>
                    <th> Prenom</th>
                    <th> Cycle</th>
                    <th> Filiere</th>
                    <th> Niveau</th>
                    <th> Date de Naissance</th>
                    <th> Date d'Inscription</th>
                    
                    
                    
                    <th>Photo</th>
                    <th>Copie CIN</th>
                    <th>Copie baccalaureat</th>
                    <th>Attestation Reussite</th>

            	

      				
      			</tr>
      		</thead>
      		<tbody>
                  <?php 
                    $sql1= "SELECT *From userinfo  join userdata on userinfo.matricule = userdata.matricule  WHERE email = '$email' " ;
                    
                    $rs = mysqli_query($con,$sql1);
                    $a = mysqli_num_rows($rs);
                    

                    if($a > 0 ){
                        while($row = mysqli_fetch_assoc($rs)) {
                            echo "<tr><td>".$row["matricule"]."</td>".
                           
                           
                            "<td>".$row["nom"]."</td>".
                            "<td>".$row["prenom"]."</td>".
                            "<td>".$row["cycle"]."</td>".
                            "<td>".$row["filiere"]."</td>".
                            "<td>".$row["niveau"]."</td>".
                            "<td>".$row["date_de_naissance"]."</td>".
                           
                            "<td>".$row["date_inscription"]."</td>".
                            "</td><td><a  style='text-decoration:none' "."href='".$row["photo"]."'"."target='_blank'". ">afficher</a></td>".
                            "</td><td><a  style='text-decoration:none' "."href='".$row["copie_cin"]."'"."target='_blank'". ">afficher</a></td>".
                            "</td><td><a  style='text-decoration:none' "."href='".$row["copie_baccalaureat"]."'"."target='_blank'". ">afficher</a></td>".
                            "</td><td><a  style='text-decoration:none' "."href='".$row["attestation_reussite"]."'"."target='_blank'". ">afficher</a></td>".
                           
                            "</tr>";
                            

                        }
                    }
                  
                  
                  
                  ?>

            </tbody>

            <br><br><br>
            
        </div>
    </body>

</html>