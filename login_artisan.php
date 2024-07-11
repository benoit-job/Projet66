<?php
session_start();
require 'config.php';
if(isset($_POST['valider']))
{
    if(!empty($_POST['contact']) && !empty($_POST['password']) )
    {
        $contact = htmlspecialchars($_POST['contact']);
        $password = htmlspecialchars($_POST['password']);

        $recupUser = $bdd->prepare('SELECT * FROM artisans WHERE contact = ? AND password = ?');

            $recupUser->execute(array($contact, $password));
            if($recupUser->rowCount() > 0){
                $_SESSION['contact'] = $contact;
                $_SESSION['password'] = $password; 
                $_SESSION['id'] = $recupUser->fetch()['id'];
                header('Location:index.php');
            }else{
                $msg = "<h5>votre mot de passe ou contact est incorrect</h5>";
        }
    }else{
          $msg = "<strong>veillez completer tous les champs</strong>";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="ENTREPRISE 66">
    <meta name="keywords" content="Ashion, unica, creative, html">
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
        <h2 class="text-center text-primary">CONNEXION ARTISAN</h2>
        <?php if(!empty($msg))
        {
            ?>
            <div class="alert alert-danger">
                <button type="button" data-dismiss="alert" class="close">&times;</button>
                <?php echo $msg; ?>
            </div>
            <?php
        }
       ?>
        <form action="" method="post">
            <div class="col-lg-8">
                <div class="form-group">
                    <label for="">Contact</label>
                    <input name='contact' type="number" placeholder="Contact" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Mot de passe</label><br>
                    <span style="display: flex">
                        <input name='password'  placeholder="Mot de passe" type="text" id="password" class="form-control">
                        <div id="eyes">
                            <i class="fa fa-eye"></i>
                            <i style="display: none" id="off" class="fa fa-eye-slash"></i>
                        </div>
                    </span>
                </div>
                <div class="form-group">
                    <input type="checkbox" name="" id=""> <span>Restez connecté</span>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit" name="valider">Se connecter</button>
                </div>
                <p>Vous n'avez pas de compte? <a href="register.php">Inscrivez vous</a></p>
            </div>
        </form>
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/java.js"></script>
  </body>
</html>