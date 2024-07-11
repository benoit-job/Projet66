<?php
session_start();

require "config.php";
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
        table{
            background: #d2d2d2 !important;
            border-radius:15px !important;
        }
        .table-responsive{
            border-radius:15px !important;
        }
    </style>
</head>

<?php include "base/header.php"; ?>
<div class="container" style="margin:180px auto 30px auto">
        <div class="table-responsive">
            <table
                class="table table-white table-bordered">
                <thead class="thead thead-dark">
                    <tr>
                        <th>Photo</th>
                    </tr>
                </thead>
                <?php

                        $id = $_GET['id'];

                        $recupArticle = $bdd->prepare('SELECT * FROM artisans WHERE id = ?');

                        $recupArticle->execute(array($id));

                        while($artisan = $recupArticle->fetch())
                        {
                            ?>
                            <tbody>
                                <tr class="text-dark">
                                    <td><img src="photo_artisans/<?= $artisan['photo'] ?>" alt="" width="200" height="200"></td>
                                    <td>
                                      <p><strong>Nom et Prénom :</strong> <?= $artisan['nom']?> <?= $artisan['prenom']?></p>
                                      <p><strong>Email:</strong> <?= $artisan['email']?></p>
                                      <p><strong>Contact:</strong> <?= $artisan['contact']?></p>
                                      <p><strong>Localisation:</strong>: <?= $artisan['localisation']?></p>
                                      <p><strong>Métier:</strong> <?= $artisan['metier']?></p>
                                      <p><strong>Nationalité:</strong> <?= $artisan['nationalite']?></p>
                                    </td>
                                </tr>
                            </tbody>
                            <?php

                        }
                ?>
            </table>
        </div>
</div>
        
    </div>
    <?php include "base/footer.php"; ?>

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