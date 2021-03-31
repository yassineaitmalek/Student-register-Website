<?php 

include "connect.php";
$q =0;

function errorp($i){
    if($i == 1){
        echo "<div style = 'background-color: #fce4e4; border: 1px solid #fcc2c3; float: left; padding: 20px 30px; transform: translate(210%,25%); height: 20px; width: 300px;' class='error_message'>
        <h2 style ='text-align: center;   color: #cc0033;font-family: Helvetica, Arial, sans-serif;font-size: 13px;font-weight: bold;line-height: 20px;text-shadow: 1px 1px rgba(250,250,250,.3);' class='error_text'>
        Cette compte existe deja
        </h2>
      </div>
      <br><br><br><br><br><br>";
    }
    else if($i == 2){
        echo "<div style = 'background-color: #fce4e4; border: 1px solid #fcc2c3; float: left; padding: 20px 30px; transform: translate(210%,25%); height: 20px; width: 300px;' class='error_message'>
                <h2 style ='text-align: center;   color: #cc0033;font-family: Helvetica, Arial, sans-serif;font-size: 13px;font-weight: bold;line-height: 20px;text-shadow: 1px 1px rgba(250,250,250,.3);' class='error_text'>
                Votre email n'est pas valid
                </h2>
              </div>
              <br><br><br><br><br><br>";

    }else if($i == 3){
        echo "<div style = 'background-color: #fce4e4; border: 1px solid #fcc2c3; float: left; padding: 20px 30px; transform: translate(210%,25%); height: 20px; width: 300px;' class='error_message'>
                <h2 style ='text-align: center;   color: #cc0033;font-family: Helvetica, Arial, sans-serif;font-size: 13px;font-weight: bold;line-height: 20px;text-shadow: 1px 1px rgba(250,250,250,.3);' class='error_text'>
                Le mot de passe est trés court
                </h2>
              </div>
              <br><br><br><br><br><br>";
        
    }else if($i == 4){
        echo "<div style = 'background-color: #fce4e4; border: 1px solid #fcc2c3; float: left; padding: 20px 30px; transform: translate(210%,25%); height: 20px; width: 300px;' class='error_message'>
                <h2 style ='text-align: center;   color: #cc0033;font-family: Helvetica, Arial, sans-serif;font-size: 13px;font-weight: bold;line-height: 20px;text-shadow: 1px 1px rgba(250,250,250,.3);' class='error_text'>
                Le mot de passe n'est pas confirmé
                </h2>
              </div>
              <br><br><br><br><br><br>";
        
    }else if($i ==5){
        echo "<div style = 'background-color: #fce4e4; border: 1px solid #fcc2c3; float: left; padding: 20px 30px; transform: translate(210%,25%); height: 20px; width: 300px;' class='error_message'>
                                <h2 style ='text-align: center;   color: #cc0033;font-family: Helvetica, Arial, sans-serif;font-size: 13px;font-weight: bold;line-height: 20px;text-shadow: 1px 1px rgba(250,250,250,.3);' class='error_text'>
                                Vous ne pouvez pas télécharger ce fichier
                                </h2>
                              </div>
                              <br><br><br><br><br><br>";
        
    }else if($i == 6){
        echo "<div style = 'background-color: #fce4e4; border: 1px solid #fcc2c3; float: left; padding: 20px 30px; transform: translate(210%,25%); height: 35px; width: 300px;' class='error_message'>
        <h2 style ='text-align: center;   color: #cc0033;font-family: Helvetica, Arial, sans-serif;font-size: 13px;font-weight: bold;line-height: 20px;text-shadow: 1px 1px rgba(250,250,250,.3);' class='error_text'>
        Une erreur s'est produite lors du téléchargement de votre fichier 
        </h2>
      </div>
      <br><br><br><br><br><br>";
        
    }else if ($i ==7){
        echo "<div style = 'background-color: #fce4e4; border: 1px solid #fcc2c3; float: left; padding: 20px 30px; transform: translate(210%,25%); height: 35px; width: 300px;' class='error_message'>
        <h2 style ='text-align: center;   color: #cc0033;font-family: Helvetica, Arial, sans-serif;font-size: 13px;font-weight: bold;line-height: 20px;text-shadow: 1px 1px rgba(250,250,250,.3);' class='error_text'>
        un des fichiers est large depasse 10MB
        </h2>
      </div>
      <br><br><br><br><br><br>";
    }
    else{
        echo "";
    }

};
if (isset($_POST["create"])){
    $email_rec = strtolower($_POST["email_rec"]);
    $pass = $_POST["pass"];
    $cpass = $_POST["cpass"];
    $matricule=$_POST["matricule"];
    $nom = strtolower($_POST["nom"]);
    $ne=str_replace(" ","",$nom);
    $prenom = strtolower($_POST["prenom"]);
    $pe=str_replace(" ","",$prenom);
    $email = $pe.'.'.$ne."@insea.ac.ma";
    $cycle = $_POST["cycle"];
    $filiere = $_POST["filiere"];
    $niveau = $_POST["niveau"];
    $date = $_POST["date"];
    $sexe = $_POST["sexe"];
    $t = date("Y/m/d");
    $etat = "non";
    $admin = 'non';
    $check = 'non';
    $code = md5(time().$nom);
    $fil = str_replace(" ","",$filiere);

    $allowed = array('jpg','jpeg','png','pdf');

    $sql = "select matricule,email from userinfo where matricule = '$matricule'";
    $rs = mysqli_query($con, $sql);
    $a = mysqli_num_rows($rs);
    if($a == 0){
            if ($pass == $cpass & strlen($pass)>8 & strpos($email,'@') !== false ){
                $like = $pe.'.'.$ne;
                $sql0 = "SELECT email from userinfo where email like '%$like%'";
                $rs = mysqli_query($con, $sql0);
                $a = mysqli_num_rows($rs);
                if($a == 0){
                    $email = $email;
                }else{
                    $email = $pe.'.'.$ne.$a."@insea.ac.ma";
                }
                $sql1 ="Insert into userinfo(email_rec,pass,matricule,nom,prenom,email,cycle,filiere,niveau,date_de_naissance,sexe,date_inscription, etat,admin,code,checkcode)
                values('$email_rec','$pass','$matricule','$nom','$prenom','$email','$cycle','$filiere','$niveau',
                '$date','$sexe','$t','$etat','$admin','$code','$check')";

                mysqli_query($con ,$sql1);

                
                /*$sql1 ="INSERT into userinfo(email_rec,pass,matricule,nom,prenom,email,cycle,filiere,niveau,date_de_naissance,sexe,date_inscription,etat,admin,code,checkcode) 
                values('$email_rec','$pass','$matricule','$nom','$prenom','$email','$cycle','$filiere','$niveau',
                '$date','$sexe','$t','$etat','$admin','$code','$check')";

                if(mysqli_query($con ,$sql1)){
                    echo "oui";
                }
                else{
                    echo "non";
                }*/
                if( ! is_dir ( 'up')){
                    mkdir('up');
                    chmod('up', 0777);
                }
                
                if( ! is_dir ( 'up/'.$fil )){
                    mkdir('up/'.$fil);
                    chmod('up/'.$fil, 0777);
                }
                
                mkdir('up/'.$fil."/".$matricule);
                chmod('up/'.$fil."/".$matricule, 0777);
                

                $allowed = array('jpg','jpeg','png','pdf');
                $donne = array("photo","copie_cin","copie_baccalaureat","attestation_reussite");
                $des = array();
                $error = array();

                for ($i=0;$i<4;$i++){
                
                                $file = $_FILES[$donne[$i]];
                            
                                $fn = $_FILES[$donne[$i]]["name"];
                                $ft = $_FILES[$donne[$i]]["tmp_name"];
                                $fs = $_FILES[$donne[$i]]["size"];
                                $fe = $_FILES[$donne[$i]]["error"];
                                $fp = $_FILES[$donne[$i]]["type"];
                                
                                $fext = explode('.',$fn);
                                $faext = strtolower(end($fext));
                                
                            
                            
                            
                            if (in_array($faext,$allowed)){
                            
                                if($fe === 0){
                                    if($fs < 1000000){
                                        
                                        $fnn = $donne[$i].'_'.$matricule.'.'.$faext;
                                        $fdes ='up/'.$fil."/".$matricule.'/'.$fnn ;
                                        move_uploaded_file($ft,$fdes);
                                        chmod($fdes, 0777);
                                        $des[$i]=$fdes ;
                                        
                                    }
                                    else{
                                       $q=7;
                                        $fe = 1;
                                        $error[$i]=$fe;
                                        break;
                                    }
                                }
                                else{
                                   $q=6;
                                    $fe = 1;
                                    $error[$i]=$fe;
                                    break;
                                }
                            }
                            else{
                                $q=5;
                                $fe = 1;
                                $error[$i]=$fe;
                                break;
                            }

                            $error[$i]=$fe;
                }
                $b = true;
                for($i=0;$i<count($error);$i++){
                    
                    if($error[$i]!= 0){
                        $b=false;
                    }
                }
            
                if($b){
                    $sql3 = "INSERT into userdata(matricule,photo,copie_cin,copie_baccalaureat,attestation_reussite) values ('$matricule','$des[0]','$des[1]','$des[2]','$des[3]')";
                    mysqli_query($con ,$sql3);

                    
                   
                    
                   
                    shell_exec("python sendmail.py $email_rec $code $email");

                    sleep(3);
                   

             
                    header("location:merci.php");


/*
                    echo "<div style = 'background-color: #ABEBC6; border: 1px solid #fcc2c3; float: left; padding: 20px 30px; transform: translate(210%,25%); height: 20px; width: 300px;' class='error_message'>
                    <h2 style ='text-align: center;   color: #239B56 ;font-family: Helvetica, Arial, sans-serif;font-size: 13px;font-weight: bold;line-height: 20px;text-shadow: 1px 1px rgba(250,250,250,.3);' class='error_text'>
                    Le compte a ete creer avec succee en atendant la confirmation par l'Admin et aussi verifier votre email
                    </h2>
                  </div>
                  <br><br><br><br><br><br>";
    */           
                }
                else{
                    
                    $sql4="DELETE FROM userinfo WHERE matricule = '$matricule'";
                    mysqli_query($con,$sql4);
                    rmdir('up/'.$fil."/".$matricule);
                    

                    
                }
                
                
            }
            else {
                    if($cpass!=$pass){
                        $q=4;

                    }
                else if(strlen($pass)<=8){
                         $q=3;
        
                }
                else{
                    $q=2;
                }
           
            }
    }
    else{
        $q = 1;

    }
    
    
   
}
    
?>



<!DOCTYPE html>
<html>
    <head>
        <title>S'Inscrire</title>
        <link rel = "shortcut icon" type = 'img/png' href="images/INSEA_logo.png" >
        <link rel="stylesheet" href="css/nav.css">
        <style>
            body{

background-image: url(css/login_b.jpg);
background-size: 1920px 1080px; 
background-attachment: fixed;
}

.t{
border-collapse: collapse;

font-size: 0.9em;
min-width: 400px;
border-radius: 30px;
opacity: 0.75;
margin-left: auto;margin-right: auto;
box-shadow: 0px 35px 50px rgba( 0, 0, 0, 0.2 );

}


h3{
font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
font-style: italic;
display: inline;
margin: 20px;
}

.block {

width: 130px;
height: 40px;
background-color: rgb(0, 153, 76);

font-family: Verdana, Geneva, Tahoma, sans-serif;
text-align: center;
border-radius: 30px;
opacity: 0.75;
margin:0 auto;

}
.selection{
text-align: center;
border-radius: 30px;
padding: 5px 14px;
display: inline;
border: none;
size: 100%;
}

.box{
    margin: 15px;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    border: none;
    width: 335px;
    height: 60px;
    font-size: 19px;
    font-weight: bold;
   
    text-align: center;
}
        </style>
        
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

<br><br>


    <img style='display: block;margin-left: auto;margin-right: auto;' src="images/INSEA_logo.png" height="90px" width="90px" align="center" class="avatar">

    <br>

<?php  errorp($q); ?>

            <form method="post" enctype="multipart/form-data" action="<?php  echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>">

            <table class="t"  width="75%" height="50%" bgcolor="white" align="center">

                    <tr>
                        <td >
                            <h3 for="matricule">Matricule : </h3>
                            <input type="text" placeholder="Entrer votre matricule" name="matricule" required autofocus class="box">
                        </td>
                        <td>
                            <h3 for="email">Email : </h3>
                                        <input type="text" placeholder="Entrer votre email" name="email_rec" required autofocus class="box">

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3 for="pass">Mot de Passe : </h3>
                            <input type="password" placeholder="Entrer votre mot de passe" name="pass" required autofocus class="box">
                        </td>
                        <td>
                            <h3 for="cpass">Confirmer votre mot de passe : </h3>
                            <input type="password" placeholder="confirmer votre mot de passe" name="cpass" required autofocus class="box">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3 for="nom">Nom : </h3>
                                        <input type="text" placeholder="Entrer votre nom" name="nom" required autofocus class="box"> 
                        </td>
                        <td>
                            <h3 for="prenom">Prénom : </h3>
                                        <input type="text" placeholder="Entrer votre prenom" name="prenom" required autofocus class="box">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3 for="date">Date de Naissance : </h3>
                            <input type="date" placeholder="YYYY / MM / DD" name="date" required autofocus class="box">
                        </td>
                        <td>
                            <h3 for="sexe">Sexe : </h3>
                                        <h3 for="homme">Homme : </h3> <input type="radio" name="sexe" value="M"  class="check" required> 
                                        <h3 for="femme">Femme : </h3><input type="radio" name="sexe" value="F"  class="check"required>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            
                                <h3 for="cycle">Cycle : </h3>
                                <select  name="cycle" size="1" class="selection" required> 
                                                
                                                <option></option>
                                                <option >Ingénieurs d’Etat</option>
                                                <option >Master</option>
                                                <option >Doctorat</option>
                                                
                                </select>
                                <br><br><br>
                        </td>
                    
                    </tr>
                    <tr>
                        <td>
                            <h3 for="niveau">Niveau : </h3>
                            <select  name="niveau" size="1" class="selection" required>
                                            
                                            <option></option>
                                            <option >1er annee</option>
                                            <option >2eme annee</option>
                                            <option >3eme anne</option>
                                            <option >4eme anne</option>
                                            
                            </select>
                            <br><br><br>
                        </td>
                        <td>
                            <h3 for="filiere">Filiere : </h3>
                            <select  name="filiere" size="1" class="selection" required>
                                            
                                            <option></option>
                                            <option >Data & Software Engineering</option>
                                            <option >Data Science</option>
                                            <option >Statistique-Economie Appliquée</option>
                                            <option >Recherche Opérationnelle et Aide à la Décision</option>
                                            <option >Statistique-Démographie</option>
                                            <option >Actuariat-Finance</option>
                                            <option >Etc</option>

                                        
                            </select>
                            <br><br><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3 for="photo">Photo : </h3>
                                        <input type="file" placeholder="Entrer votre photo" name="photo" required autofocus>
                                        <br><br><br>
                        </td>
                        <td>
                            <h3 for="copie_cin">Copie CIN : </h3>
                            <input type="file" placeholder="Entrer votre copie cin" name="copie_cin" required autofocus>
                            <br><br><br>
                    </td>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3 for="copie_baccalaureat">Copie Baccalauréat : </h3>
                                        <input type="file" placeholder="Entrer votre copie baccalaureat" name="copie_baccalaureat" required autofocus>
                                        <br><br><br>
                        </td>
                        <td>
                            <h3 for="attestation_reussite">Attestation Réussite : </h3>
                            <input type="file" placeholder="Entrer votre attestation reussite" name="attestation_reussite" required autofocus>
                            <br><br><br>
                        </td>

                    <tr>
                        <td height="100px" width="100px" align="center">
                            <input type="submit" value="Créer" name="create" class="block">
                        <td height="100px" width="100px" align="center">
                            <input type="reset" value="Initialiser" name="reset" class="block">
                            
                        </td>
                    </tr>

            </table>
            
                
        </form>

        <form  method="post" action="main.php" >
            
             <input type="submit" value="Retour" name="return" class="block" align = "center" style = ' margin: auto ;transform: translate(870px,0px);;'>
        </form>


   
 
        

    </body>
</html>
