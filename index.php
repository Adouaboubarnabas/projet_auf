<?php 
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=auf', 'root','');
if(isset($_POST['seconnecter'])){
        if(!empty($_POST['mailconnect']) AND !empty($_POST['mdpconnect'])){
            $mailconnect = htmlspecialchars($_POST['mailconnect']);
            $mdpconnect = sha1($_POST['mdpconnect']);

            $recupUser = $bdd->prepare('SELECT * FROM gest WHERE email = ? AND motdepasse = ?');
            $recupUser->execute(array($mailconnect, $mdpconnect));
            if($recupUser->rowCount() > 0){
                $_SESSION["mailconnect"] = $mailconnect;
                $_SESSION["mdpconnect"] = $mdpconnect;
                $_SESSION["id"] = $recupUser->fetch()['id'];
                header('Location:abonnement.php');

            }
            else{
                $error = "Votre Mot de passe ou email est incorrect";
            }

    }
    else{
        $error= " Veuillez completer tous les champs";
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
    <title>Acceuil</title>
</head>
<body>
    <header class="container-fluid">
        <img src="./images/logo.svg.png" class="para1">
        <h4 class="para2"><a href="incription.php" style="text-decoration:none; color:#ffffff; font-size:18px;">Inscrivez-vous ici</a></h4>
    </header>
    <section class="container corp2page">
        <p class="nomapli" id="nomapplitext">
            Notre Application <br>de Gestion des Abonnes
        </p>
   </section>
   <section class="container sect2abn">
       <div class="row">
           <div class="col-md-7 col-xd-12 imageacceuil">
               <img class="imageacceuil2" src="./images/photoacceuil.png">
           </div>
           <div class="col-md-5 col-xd-12 partieconnexion">
               <form action="" method="POST" class="container">
                   <h2>Connexion</h2>
                   <label> Adresse Mail</label>
                   <input type="text" name="mailconnect"></input>
                   <label>Mots de Passe</label>
                   <input type="password" name="mdpconnect"></input>
                   <input type="submit" name="seconnecter">
                   <?php 
                    if(isset($error))
                    {
                        echo "<p style= color:red;>$error</p>";
                    }
                ?>
               </form>
           </div>
       </div>
   </section>
   <footer class="container-fluid pieddepasse">
       <div>
           <h5>©Agence Universitaire De La francophonie 2022 Tous droits réservés</h5>
       </div>
   </footer>
</body>
</html>
