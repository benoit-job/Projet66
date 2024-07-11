<?php 
session_start();
require "config.php";

$product_id = $_GET['id'];

if(isset($_POST['valider']))
{
    if(isset($_POST['title']) && isset($_POST['subtitle']) && isset($_POST['stock']) && isset($_POST['prix']) && isset($_POST['description']))
    {
        if(!empty($_POST['title']) && !empty($_POST['subtitle'])  && !empty($_POST['stock'])  && !empty($_POST['prix'])  && !empty($_POST['description']))
        {
            $title = htmlspecialchars($_POST['title']);
            $subtitle = htmlspecialchars($_POST['subtitle']);
            $stock = htmlspecialchars($_POST['stock']);
            $prix = htmlspecialchars($_POST['prix']);
            $description = htmlspecialchars($_POST['description']);

            $recupProduct = $bdd->prepare('UPDATE article SET title = ?, subtitle = ?, stock = ?, prix = ?, description = ? WHERE id = ? ');
            $c = $recupProduct->execute(array($title, $subtitle, $stock, $prix, $description,$product_id));

            if($c)
            {
                $msg = "Article modifié avec succès";
            }


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
</head>
  <body>
  <?php include "base/header.php"; ?>
  <?php
    $id = $_GET['id'];
    
    $recupProduct = $bdd->prepare("SELECT * FROM article WHERE id = ?");

    $recupProduct->execute(array($id));

    $article = $recupProduct->fetch();

   ?>
<!-- Breadcrumb Begin -->
<div class="breadcrumb-option" style="margin-top:100px">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="{{route('recherche.artisans')}}"><i class="fa fa-home"></i> Home</a>
                    <span><?= $article['title'] ?></span>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
        if(!empty($msg))
        {
            ?>
            <div class="container">
                <div class="alert alert-success">
                    <button type="button" data-dismiss="alert" class="close">&times;</button>
                    <?php echo $msg; ?>
                </div>
            </div>
            <?php
        }
?>
    <div class="container" style="margin: 30px auto 20px auto">
        <div class="col col-lg-8">
            <h4 class="text-primary">MODIFIEZ LES INFORMATIONS DE L'ARTICLE</h4>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Titre</label>
                    <input type="text" value="<?= $article['title'] ?>" name="title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Sous-titre</label>
                    <input type="text" value="<?= $article['subtitle'] ?>" value="" name="subtitle" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Stock</label>
                    <input type="number" value="<?= $article['stock'] ?>" name="stock" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Prix</label>
                    <input type="number" value="<?= $article['prix'] ?>" name="prix" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="description" id="" cols="30" rows="8" class="form-control" placeholder="<?= $article['description'] ?>"></textarea>
                    <input type="hidden" name="description" value="<?= $article['description'] ?>">
                </div>
                <button type="submit" class="btn btn-primary" name="valider">Envoyer</button>
            </form>
        </div>
    </div>
    <?php include "base/footer.php" ?>
<!-- Js Plugins -->
<script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>