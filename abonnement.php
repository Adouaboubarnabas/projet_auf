<?php
session_start(); 
$bdd = new PDO('mysql:host=127.0.0.1;dbname=auf', 'root','');
if(isset($_POST['validerabnmt']))
{
    if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['datenaissance']) AND!empty($_POST['debutabonnement']) AND!empty($_POST['finabonnement']) AND!empty($_POST['email']) AND!empty($_POST['finabonnement']))
    {
      $nom = $_POST['nom'];
      $prenom = $_POST['prenom'];
      $datedenaissance = $_POST['datenaissance'];
      $debut_abonnement = $_POST['debutabonnement'];
      $fin_abonnement = $_POST['finabonnement'];
      $numero = $_POST['telephone'];
      $adremail = $_POST['email'];
      $error = "Veuillez remplir tous les champs";
    
      $abonnement = $bdd->prepare("INSERT INTO abonnes(nom,prenom,date_de_naissance,debut_abonnement,fin_abonnement,email,telephone) VALUES(?,?,?,?,?,?,?)");
      $abonnement->execute(array($nom, $prenom, $datedenaissance, $debut_abonnement, $fin_abonnement, $adremail, $numero));
      if($abonnement){
        header("Location:abonnement.php");
        }
    }
    else{
      $error = "Veuillez remplir tous les champs!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <script src="./js/bootstrap.js"></script>
    <script src="https://kit.fontawesome.com/1793a7358a.js" crossorigin="anonymous"></script>
    <title>Abonnement</title>
</head>
<body>
    <header class="container-fluid">
        <img src="./images/logo.svg.png" class="para1">
        
        <h3 class="para2abonnement"><a style="text-decoration:none; color:#ffffff" href="index.php">Deconnexion</a><i class="fa-solid fa-user"></i></h3>
        
    </header>
    <section class="corpsdepagedeux">
        <div class="barrebleu">
        <div class="row">
          <div class="col">
              <p style="color:#FFFFFF;">Abonnement</p>
              <a style="color:#FFFFFF;" class="iconeabonnement" href="abonnement.php"><i class="fa-solid fa-user-plus"></i></a>
            </div>
            <div class="col">

            </div>
            <div class="col">
              <p style="color:#FFFFFF;">Liste Abonnés</p>
              <a style="color:#FFFFFF;" class="iconeabonnement"href="suivi.php"><i class="fa-solid fa-list-check"></i></a>
            </div>
      </div>

        </div>
        <div class="container suivi">
            <br></br>
            <div class="partieabonnementform">
              <form class="container" method="POST" action="">
                <div class="form-row row";>
                  <div class="col-md-6 col-xd-12">
                  <label for="inputPassword4">Nom</label>
                   <input type="text" name="nom" class="form-control" placeholder="Nom">
                 </div>
                  <br>
                  <div class="col-md-6 col-xd-12">
                  <label for="inputPassword4">Prénom</label>
                   <input type="text" name="prenom" class="form-control" placeholder="Prénom">
                  </div>
                </div>
                <br>
                <div class="form-row row" style="display:flex";>
                  <div class="col-md-6 col-xd-12">
                  <label for="inputPassword4">Date de Naissance</label>
                   <input type="date" name="datenaissance" min="1950-04-24" max="2050-12-31"class="form-control" placeholder="Date de Naissance">
                 </div>
                  <br>
                  <div class="col-md-6 col-xd-12">
                  <label for="inputPassword4">Début d'Abonnement</label>
                   <input type="date" name="debutabonnement" min="2022-04-24" max="2050-12-31" class="form-control" placeholder="Début   d'Abonnement">
                  </div>
                  <br>
                </div>
                <br>
                <div class="form-row row" style="display:flex";>
                  <div class="col-md-6 col-xd-12">
                  <label for="inputPassword4">Fin d'Abonnement</label>
                   <input type="date" name="finabonnement"min="2022-04-24" max="2050-12-31" class="form-control" placeholder="Fin d'Abonnement">
                 </div>
                  <br>
                  <div class="col-md-6 col-xd-12">
                  <label for="inputPassword4">Email</label>
                   <input type="text" name="email" class="form-control" placeholder="Email">
                  </div>
                </div>
                <br>
                <div class="form-row row" style="display:flex";>
                  <div class="col-md-6 col-xd-12">
                  <label for="inputPassword4">Téléphone</label>
                   <input type="text" name="telephone" class="form-control" placeholder="Telephone">
                 </div>
                </div>
                <div class=""><br>
                 <input type="submit" class="bouttton" name="validerabnmt" value= "Valider" >
               </div>
               <?php 
                    if(isset($error))
                    {
                      echo "<p style= color:red;>$error</p>";
                    }
                    else{
                      $error =" Votre abonnement a été effectué avec succèes!";
                      echo "<p  style= color:green;>$error</p>";
                    }
                ?>
              </form> 
           </div>
        </div>
    </section>
    <footer class="container-fluid pieddepasse2">
       <div>
           <h5>©Agence Universitaire De La francophonie 2022 Tous droits réservés</h5>
       </div>
   </footer>
</body>

</html>