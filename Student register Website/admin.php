<?php
include "connect.php";
session_start();
if (isset($_SESSION['user'])){
    $email = $_SESSION['user'];
    $k = explode('@',$email);
    
    $p = explode('.',$k[0]);
   
    
}
else{
    $p=array("admin","admin");
}



?>


<!DOCTYPE html>
<html>
    <head>
    <title>Admin</title>
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel = "shortcut icon" type = 'img/png' href="images/INSEA_logo.png" >
    </head>
    <body>
    <div id='cssmenu'>
<ul>
   <li><a href='admin.php'>INSEA</a></li>
   <li class='active' style="transform: translate(1625px,0%);"><a href='#'>Paramétres</a>
      <ul>
               
              
               <li><a href='signout.php'>Se Déconnecter </a></li>
          
         
      </ul>
   </li>
   
</ul>
</div>

        <div class="lg">
            
              



   

        <br><br>
        <img style='display: block;margin-left: auto;margin-right: auto;' src="images/INSEA_logo.png" height="90px" width="90px" align="center" class="avatar">
        <br><br> <br><br>

        
        <h3 align="center">Bonjour <?php echo $p[0].' '.$p[1];?>
        <br><br><br>
        <h3 align="center">La Table des Nouveaux Enregistrements </h3>
     <div class="table-wrapper">
         
         <br><br>
      	<table  cellspacing="0" border="1"  class="fl-table">
      		<thead>
      			<tr>
                    <th> Matricule</th>
      				<th> Email Recuperation</th>
                    <th> Password</th>
                    <th> Nom</th>
                    <th> Prenom</th>
                    <th> Cycle</th>
                    <th> Filiere</th>
                    <th> Niveau</th>
                    <th> Date de Naissance</th>
                    <th>Sexe </th>
                    <th> Date d'Inscription</th>
                    
                    <th>Photo</th>
                    <th>Copie CIN</th>
                    <th>Copie baccalaureat</th>
                    <th>Attestation Reussite</th>

            	

      				<th colspan="2">Actions</th>
      			</tr>
      		</thead>
      		<tbody>
                  <?php 
                    $sql1= "SELECT *From userinfo  join userdata on userinfo.matricule = userdata.matricule  WHERE etat = 'non' AND admin ='non' " ;
                    
                    $rs = mysqli_query($con,$sql1);
                    $a = mysqli_num_rows($rs);
                    

                    if($a > 0 ){
                        while($row = mysqli_fetch_assoc($rs)) {
                            echo "<tr><td>".$row["matricule"]."</td>".
                            "<td>".$row["email_rec"]."</td>".
                            "<td>".$row["pass"]."</td>".
                            "<td>".$row["nom"]."</td>".
                            "<td>".$row["prenom"]."</td>".
                            "<td>".$row["cycle"]."</td>".
                            "<td>".$row["filiere"]."</td>".
                            "<td>".$row["niveau"]."</td>".
                            "<td>".$row["date_de_naissance"]."</td>".
                            "<td>".$row["sexe"]."</td>".
                            "<td>".$row["date_inscription"]."</td>".
                            "</td><td><a style='text-decoration:none'"."href='".$row["photo"]."'"."target='_blank'". ">Afficher</a></td>".
                            "</td><td><a style='text-decoration:none'"."href='".$row["copie_cin"]."'"."target='_blank'". ">Afficher</a></td>".
                            "</td><td><a style='text-decoration:none'"."href='".$row["copie_baccalaureat"]."'"."target='_blank'". ">Afficher</a></td>".
                            "</td><td><a style='text-decoration:none'"."href='".$row["attestation_reussite"]."'"."target='_blank'". ">Afficher</a></td>".
                           
                            "</td><td><a href=\"accepter.php?matricule=".$row["matricule"]."\">Accepter</a></td>".
                            "</td><td><a href=\"rejeter.php?matricule=".$row["matricule"]."\">Rejeter</a></td>".
                            "</tr>";
                            

                        }
                    }
                  
                  
                  
                  ?>

            </tbody>

        </table>
            <br><br><br>
            
        </div>

        <br><br><br><br>
        <h3 align="center">La Table des Enregistrements Acceptés</h3>
        <div class="table-wrapper">
         
         <br><br>
      	<table  cellspacing="0" border="1" class="fl-table">
      		<thead>
      			<tr>
                  <th> Matricule</th>
      				<th> Email Recuperation</th>
                    <th> Password</th>
                    <th> Nom</th>
                    <th> Prenom</th>
                    <th> Cycle</th>
                    <th> Filiere</th>
                    <th> Niveau</th>
                    <th> Date de Naissance</th>
                    <th>Sexe </th>
                    <th> Date d'Inscription</th>
                    
                    <th>Photo</th>
                    <th>Copie CIN</th>
                    <th>Copie baccalaureat</th>
                    <th>Attestation Reussite</th>


      				<th>Actions</th>
      			</tr>
      		</thead>
      		<tbody>
                  <?php 
                    $sql1= "SELECT *From userinfo  join userdata on userinfo.matricule = userdata.matricule  WHERE etat = 'oui' AND admin ='non' " ;
                    
                    $rs = mysqli_query($con,$sql1);
                    $a = mysqli_num_rows($rs);
                    

                    if($a > 0 ){
                        while($row = mysqli_fetch_assoc($rs)) {
                            echo "<tr><td>".$row["matricule"]."</td>".
                            "<td>".$row["email_rec"]."</td>".
                            "<td>".$row["pass"]."</td>".
                            "<td>".$row["nom"]."</td>".
                            "<td>".$row["prenom"]."</td>".
                            "<td>".$row["cycle"]."</td>".
                            "<td>".$row["filiere"]."</td>".
                            "<td>".$row["niveau"]."</td>".
                            "<td>".$row["date_de_naissance"]."</td>".
                            "<td>".$row["sexe"]."</td>".
                            "<td>".$row["date_inscription"]."</td>".
                            "</td><td><a style='text-decoration:none' "."href='".$row["photo"]."'"."target='_blank'". ">Afficher</a></td>".
                            "</td><td><a style='text-decoration:none' "."href='".$row["copie_cin"]."'"."target='_blank'". ">Afficher</a></td>".
                            "</td><td><a  style='text-decoration:none'"."href='".$row["copie_baccalaureat"]."'"."target='_blank'". ">Afficher</a></td>".
                            "</td><td><a  style='text-decoration:none'"."href='".$row["attestation_reussite"]."'"."target='_blank'". ">Afficher</a></td>".
                           
                            "</td><td><a style='text-decoration:none' color = 'red' href=\"rejeter.php?matricule=".$row["matricule"]."\">Supprimer</a></td>".
                            
                            "</tr>";
                            

                        }
                    }
                  
                  
                  
                  ?>

            </tbody>

        </table>
            <br><br><br>
            
        </div>
    </body>

</html>