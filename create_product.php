<?php

session_start();

require ('config.php');

if(isset($_POST['valider']))
{
    if(isset($_POST['title']) && isset($_POST['subtitle']) && isset($_POST['prix']) && isset($_POST['stock']) && isset($_POST['description']) && isset($_FILES['image']) && isset($_POST['category_id']))
    {
        if(!empty($_POST['title']) && !empty($_POST['subtitle']) && !empty($_POST['prix']) && !empty($_POST['stock']) && !empty($_POST['description']) && !empty($_FILES['image']['name']) && !empty($_POST['category_id']))
        {
            $nomfichier = $_FILES['image']['name'];
            $tmp = $_FILES['image']['tmp_name'];
            $newfilename = $nomfichier ;

            $deplacefichier = move_uploaded_file($tmp, 'avatars/'.$newfilename);

            if($deplacefichier)
            {
                $title = htmlspecialchars($_POST['title']);
                $subtitle = htmlspecialchars($_POST['subtitle']);
                $prix = htmlspecialchars($_POST['prix']);
                $stock = htmlspecialchars($_POST['stock']);
                $description = htmlspecialchars($_POST['description']);
                $category_id = $_POST['category_id'];

                $insertProduct = $bdd->prepare('INSERT INTO article(category_id,title, subtitle,prix,stock,description,image) VALUES(?,?,?,?,?,?,?)');

                $insertProduct = $insertProduct->execute(array($category_id,$title,$subtitle,$prix,$stock,$description,$newfilename));

                $recupProduct = $bdd->prepare('SELECT * FROM article');

                $msg = 'Article crée avec succès';

            } else{
                $msg ='L\'image doit etre inferieur à 5 Mo';
            }


        }else{
            $msg = 'Veuillez complètez tous les champs';
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
            background: #d2d2d2;;
        }
        .footer{
            background:#fff;
        }
        #container{
            width: 500px;
            margin : 50px auto 20px auto;
            background: #fff;
            padding:20px 0;

        }
        @media(max-width:760px)
        {
            #container{
                width: 95%;
            }
        }
    </style>
</head>
  <body>
  <?php include "base/header.php"; ?>
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option" style="margin-top: 100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href=""><i class="fa fa-home"></i> Home</a>
                        <span>CREER UN ARTICLE</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container" id="container">
        <?php if(!empty($msg))
        {
            ?>
            <div class="alert alert-success">
                <?php echo $msg; ?>
                <button type="button" data-dismiss="alert" class="close">&times;</button>
            </div>
            <?php
        }
       ?>
        <div class="col col-lg-8">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Catégorie</label>
                    <select name="category_id" id="" class="form-control" required>
                        <option value=""></option>
                        <?php
                        $recupCategory = $bdd->query('SELECT * FROM category');

                        while($category = $recupCategory->fetch())
                        {
                            ?>
                            <option value="<?= $category['id']; ?>"><?= $category['title']; ?></option>
                            <?php
                        }
                         ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Titre</label>
                    <input type="text" name="title" class="form-control" placeholder="Titre" required>
                </div>
                <div class="form-group">
                    <label for="">Sous-titre</label>
                    <input type="text" name="subtitle" class="form-control" placeholder="Sous-titre" required>
                </div>
                <div class="form-group">
                    <label for="">Stock</label>
                    <input type="number" name="stock" class="form-control" placeholder="Stock" required>
                </div>
                <div class="form-group">
                    <label for="">Prix</label>
                    <input type="number" name="prix" class="form-control" placeholder="Prix" required>
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="description" id="" cols="30" rows="8" required class="form-control" placeholder="Description..."></textarea>
                </div>
                <div class="form-group">
                    <label for="">Ajoutez une image</label>
                    <input type="file" name="image" class="form-control">
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