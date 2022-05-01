<?php

$bdd = new PDO('mysql:host=127.0.0.1;dbname=auf', 'root','');
if(isset($_POST['inscription']))
{
    if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND!empty($_POST['mail']) AND!empty($_POST['motdepasse']))
    {
      $nom = $_POST['nom'];
      $prenom = $_POST['prenom'];
      $mail = $_POST['mail'];
      $mdp = sha1($_POST['motdepasse']);
      $cmdp= sha1($_POST['cmotdepasse']);
      $error = "Veuillez remplir tous les champs";
    
      $inscription = $bdd->prepare("INSERT INTO gest(nom,prenom,email,motdepasse) VALUES(?,?,?,?)");
      $inscription->execute(array($nom, $prenom, $mail, $mdp,));
      if($inscription){
        header("Location:index.php");
        }
    }
    else{
      $error = "Veuillez remplir tous les champs!";
    }
}
?>



<!DOCTYPE html>
<html lang="fr">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Formulaire formatif</title>
      <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;1,100;1,300;1,400&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700;800&family=Roboto:ital,wght@0,100;0,300;0,400;1,100;1,300;1,400&display=swap" rel="stylesheet">
      <script src="https://kit.fontawesome.com/498d14878f.js" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="assets/css/reset.css">
      <link rel="stylesheet" href="assets/css/style.css">
      <link rel="stylesheet" href="inscription.css">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <script src="./js/bootstrap.js"></script>
   </head>
   <body>
           <header class="container-fluid">
        <img src="./images/logo.svg.png" class="para1">
        <h4 class="para2"><a href="index.php" style="text-decoration:none; color:#ffffff; font-size:18px;">Connexion</a></h4>
    </header>
      <main>
            <div class="photooo">
               <img class="imageacceuil2" src="./images/photoacceuil.png">
           </div>
         <div class="wrapper">
            <!-- FIN FORMULAIRE INDENTIFICATION -->
            <section id="inscription">
               <!-- début formulaire inscription  -->
               <form action="" class="inscription" method="post">
                  <fieldset>
                     <!-- Entête du formulaire -->
                     <legend>
                        <h1><strong>Inscription</strong></h1>
                     </legend>
                     <p>
                        <i class="fas fa-square"></i>
                        <label for="user">Nom</label>
                        <input type="text" name="nom" id="iuser" value="" placeholder="Nom">
                     </p>
                     <p>
                        <i class="fas fa-square"></i>
                        <label for="user">Prenom</label>
                        <input type="text" name="prenom" id="iuser" value="" placeholder="Prenom">
                     </p>
                     <!-- Fin -->
                     <!-- début du Champ Courriel  -->
                     <p>					
                        <i class="fas fa-square"></i>
                        <label for="mail">Email</label>
                        <input type="email" name="mail" id="imail" value="" placeholder="mradouabou97@gmail.com">
                     </p>
                     <!-- Fin -->
                     <!-- début du Champ MDP  -->
                     <p>
                        <i class="fas fa-square"></i>
                        <label for="mdp">Mot de passe</label>
                        <input type="password" name="motdepasse" id="imdp" placeholder="Mot de passe" value="">
                     </p>
                     <!-- début du Champ Confirmer MDP  -->
                     <p>
                        <i class="fas fa-square"></i>
                        <label for="cmdp">Confirmer le mot de passe</label>
                        <input type="password" name="cmotdepasse" id="cmdp" placeholder="Mot de passe" value="">
                     </p>
                  </fieldset>
                  <!-- début du bouton identification  -->
                  <p>
                     <input type="submit" name="inscription" class="button" value="Inscription">
                  </p>
                  <p class="msgalert">
                      <?php
                        if(isset($error))
                        {
                        echo "<p style= color:red;>$error</p>";
                        }
                       ?>
                  </p>
                  </div>

               </form>
            </section>
         </div>
      </main>
      <footer class="container-fluid pieddepasse">
       <div>
           <h5>©Agence Universitaire De La francophonie 2022 Tous droits réservés</h5>
       </div>
   </footer>
   </body>
</html>
