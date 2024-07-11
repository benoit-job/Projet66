<?php 
session_start();
require "config.php";

        $recupArtisan = $bdd->query('SELECT * FROM artisans ORDER BY id DESC');
        
        if(!empty($_GET['search']))
        {
            $search = htmlspecialchars($_GET['search']);
            $recupArtisan = $bdd->query("SELECT * FROM artisans WHERE CONCAT(metier,localisation) LIKE '%$search%' ORDER BY id DESC");
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
    <!-- Header Section End -->
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option" style="margin-top:100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="shop__sidebar">
                        <div class="sidebar__categories">
                            <div class="section-title">
                                <h4>Categories</h4>
                            </div>
                            <div class="categories__accordion">
                                <div class="accordion" id="accordionExample">
                                    <div class="card">
                                        <div class="card-heading">
                                            <a href="#">Villes</a>
                                        </div>
                                        <div>
                                            <form action="" method="get">
                                            <select name="search" id="" class="form-control">
                                                <option value=""></option>
                                                <option value="ABIDJAN">ABIDJAN</option>
                                                <option value="DALOA">DALOA</option>
                                                <option value="BOUAKE">BOUAKE</option>
                                                <option value=""></option>
                                            </select>
                                            <div class="card">
                                                <div class="card-body">
                                                    <button class="btn btn-primary" type="submit"><span class="fa fa-filter"></span></button>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-heading">
                                            <a href="#">Metiers</a>
                                        </div>
                                        <div>
                                            <form action="" method="get">
                                                <select name="search" id="" class="form-control">
                                                    <option value=""></option>
                                                    <option value="PARTISIER">PARTISIER</option>
                                                    <option value="COUTURIER">COUTURIER</option>
                                                    <option value="MENUSIER">MENUSIER</option>
                                                    <option value=""></option>
                                                </select>
                                                <div class="card">
                                                    <div class="card-body">
                                                        <button class="btn btn-secondary" type="submit"><span class="fa fa-filter"></span></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    <div class="row">
                        <?php
                        if($recupArtisan->rowCount() >0)
                        {
                            ?>
                        <?php
                        while($artisan = $recupArtisan->fetch())
                        {
                            ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="product__item">
                            <?php
                                if($artisan['photo'])
                                {
                                    ?>
                                    <div class="product__item__pic set-bg" data-setbg="photo_artisans/<?= $artisan['photo'] ?>">
                                        <ul class="product__hover">
                                            <li><a href="photo_artisans/<?= $artisan['photo'] ?>" class="image-popup"><span class="arrow_expand"></span></a></li>
                                            <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                        </ul>
                                    </div>
                                    <?php
                                }else{
                                    ?>
                                    <div class="product__item__pic set-bg" data-setbg="img/avatar.jpg">
                                    <div class="label new">New</div>
                                    <ul class="product__hover">
                                        <li><a href="img/avatar.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                                        <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                    </ul>
                                </div>
                                    <?php
                                }
                                ?>
                                <div class="product__item__text">
                                    <h6><a href="info_artisan.php?id=<?= $artisan['id'] ?>"><?php echo $artisan['nom']; ?> <?php echo $artisan['prenom']; ?></a></h6>
                                    <h3><a href="info_artisan.php?id=<?= $artisan['id'] ?>"><?php echo $artisan['metier']; ?></a></h3>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                    ?>
                     <?php
                        }else{
                            ?>
                                <h3 class="text-danger text-center">Aucun résultat pour: <span class="text-primary"><?= $search ?></span></h3>
                            <?php
                        }
                        ?>
                        <div class="col-lg-12 text-center">
                            <div class="pagination__option">
                                <a href="#">1</a>
                                <a href="#">2</a>
                                <a href="#">3</a>
                                <a href="#"><i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->
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