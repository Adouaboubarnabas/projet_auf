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
    <title>Suivi</title>
</head>
<body>
  <header class="container-fluid">
        <img src="./images/logo.svg.png" class="para1">
        <h3 class="para2abonnement"><a style="text-decoration:none; color:#ffffff" href="index.php">Deconnexion</a><i class="fa-solid fa-user"></i></h3>
  </header>
  <section class="corpsdepagedeux">
      <div class="barrebleu" style="background-color:#86bc25 !important;">
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
      <div class="enregistrement container"style="color:#86bc25 !important;">
            <div class=" partieabonnementform">
          <table class="table container-fluid" style="color:#86bc25 !important;">
          <thead class="thead-light" style="text-align:center;">
          <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Date de Naissance</th>
            <th>Debut d'Abonnement</th>
            <th>Fin d'abonnement</th>
            <th>Email</th>
            <th>Télephone</th>
          </tr>
          </thead>
           <?php 
                   $con = mysqli_connect("localhost","root","","auf");
                   $req3 = mysqli_query($con , "SELECT * FROM abonnes");
                   if(mysqli_num_rows($req3) == 0){

                      echo "<p  style= color:red;>Aucun abonné n'as été ajouté!</p>";
                   }else {
                       while($row = mysqli_fetch_assoc($req3)){
                           echo ' 
                           <tbody style="text-align:center;">
                           <tr> 
                             <td>'.$row['nom'].'</td>
                             <td>'.$row['prenom'].'</td>
                             <td>'.$row['date_de_naissance'].'</td>
                             <td>'.$row['debut_abonnement'].'</td>
                             <td>'.$row['fin_abonnement'].'</td>
                             <td>'.$row['email'].'</td>
                             <td>'.$row['telephone'].'</td>
                           </tr>
                           </tbody>
                           ';
                       }
                   }

                ?>
          </table>
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