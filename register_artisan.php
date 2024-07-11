<?php
session_start();
require 'config.php';
if(isset($_POST['valider']))
{
    if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['contact']) && isset($_POST['sexe']) && isset($_POST['datenaissance']) && isset($_POST['localisation']) && isset($_POST['metier']) && isset($_POST['nationalite']) && isset($_POST['password']) && isset($_FILES['photo']))
    {
        if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['contact']) && !empty($_POST['sexe']) && !empty($_POST['datenaissance']) && !empty($_POST['localisation']) && !empty($_POST['metier']) && !empty($_POST['nationalite']) && !empty($_POST['password']) && !empty($_FILES['photo']['name']))
        {

            $nomfichier = $_FILES['photo']['name'];
            $tmp = $_FILES['photo']['tmp_name'];

            $newfilename = $nomfichier;
            $movefile = move_uploaded_file($tmp,'photo_artisans/'.$newfilename);
            if($movefile)
            {

                    $nom = htmlspecialchars($_POST['nom']);
                    $prenom = htmlspecialchars($_POST['prenom']);
                    $email = htmlspecialchars($_POST['email']);
                    $contact = htmlspecialchars($_POST['contact']);
                    $sexe = htmlspecialchars($_POST['sexe']);
                    $datenaissance = htmlspecialchars($_POST['datenaissance']);
                    $localisation = htmlspecialchars($_POST['localisation']);
                    $metier = htmlspecialchars($_POST['metier']);
                    $nationalite = htmlspecialchars($_POST['nationalite']);
                    $password = htmlspecialchars($_POST['password']);
                    
                $insertUser = $bdd->prepare('INSERT INTO artisans(nom , prenom, email, contact, sexe, datenaissance, localisation, metier, nationalite, password,photo) VALUES(?,?,?,?,?,?,?,?,?,?,?)');
                $insertUser->execute(array($nom , $prenom, $email, $contact, $sexe, $datenaissance, $localisation, $metier, $nationalite, $password, $newfilename));

                $recupUser = $bdd->prepare('SELECT * FROM artisans WHERE contact = ? AND password = ?');
                $recupUser->execute(array($contact, $password));
                if($recupUser->rowCount() > 0){
                    $_SESSION['nom'] = $nom;
                    $_SESSION['prenom'] = $prenom;
                    $_SESSION['email'] = $email;
                    $_SESSION['contact'] = $contact;
                    $_SESSION['sexe'] = $sexe;
                    $_SESSION['datenaissance'] = $datenaissance;
                    $_SESSION['localisation'] = $localisation;
                    $_SESSION['metier'] = $metier;
                    $_SESSION['nationalite'] = $nationalite;
                    $_SESSION['photo'] = $newfilename;
                    $_SESSION['password'] = $password;
                    $_SESSION['id'] = $recupUser->fetch()['id'];
                }

                $msg = 'Utilisateur enregistré avec succès';

            }else{
                 $msg = 'Votre photo doit etre inferieur à 5 Mo';
            }
        }else{
               $msg = "<strong>veillez completer tous les champs</strong>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Application web qui féra le pont entre artisans et client">
    <meta name="keywords" content="ecommerce, artisans, artisan, articles, e-commerce">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/Entreprise66.png.jpg">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ENTREPRISE 66</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <style>
        body{
            background:yellowgreen;
        }
        .container{
            width: 500px;
            margin : 50px auto 0 auto;
            background: #fff;
            padding:20px 0;
        }
        @media(max-width:760px)
        {
            .container{
                width: 95%;
            }
        }
    </style>
</head>
  <body>
    <div class="container">
        <h2 class="text-center text-primary">INSCRIPTION ARTISAN</h2>
        <?php 
        if(!empty($msg))
        {
            ?>
            <div class="alert alert-success">
                <button type="button" data-dismiss="alert" class="close">&times;</button>
                <?php echo $msg; ?>
            </div>
            <?php
        }
       ?>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="col-lg-8">
                <div class="form-group">
                    <label for="">Nom</label>
                    <input name='nom' placeholder="Nom" type="text" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Prenom</label>
                    <input name='prenom' placeholder="Prenom" type="text" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input name='email' placeholder="Email" type="text" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Contact</label>
                    <input name='contact' placeholder="Contact" type="text" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Sexe</label>
                    <select name="sexe" id="" class="form-control" required>
                        <option value=""></option>
                        <option value="MASCULIN">MASCULIN</option>
                        <option value="FEMININ">FEMININ</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Date de naissance</label>
                    <input name='datenaissance' placeholder="Date de naissance" type="date" class="form-control">
                </div>
                <div class="form-group">
                    <label for="localisation">Localisation</label>
                    <select name="localisation" id="" class="form-control" required>
                        <option value="ABIDJAN">ABIDJAN</option>
                        <option value="DIVO">DIVO</option>
                        <option value="MAN">MAN</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="metier">Metier</label>
                    <select name="metier" id="" class="form-control" required>
                        <option value=""></option>
                        <option value="COIFFEUR(SE)">COIFFEUR/SE</option>
                        <option value="PARTISIER(E)">PARTISIER(E)</option>
                        <option value="MECANICIEN(NE)">MECANICIEN(NE)</option>
                        <option value="MENUISIER(E)">MENUISIER(E)</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Nationalité</label>
                    <select name="nationalite" id="" class="form-control" required>
                        <option value=""></option>
                        <option value="IVOIRIENNE">IVOIRIENNE</option>
                        <option value="CEDEAO">CEDEAO</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Une photo</label>
                    <input name='photo' type="file" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label><br>
                    <span style="display: flex">
                        <input name='password'  placeholder="Mot de passe" type="text" id="password" class="form-control" required> 
                        <div id="eyes">
                            <i class="fa fa-eye"></i>
                            <i style="display: none" id="off" class="fa fa-eye-slash"></i>
                        </div>
                    </span>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit" name="valider">S'inscrire</button>
                </div>
                <p>Avez vous déja un compte ? <a href="login.php">Connectez vous</a></p>
        </form>
        </div>
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/java.js"></script>
  </body>
</html>