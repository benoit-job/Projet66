<?php 
session_start();
require "config.php";

if(isset($_POST['delete_panier']))
    {
        $id_panier = $_GET['id'];

        $deleteArticle = $bdd->prepare("DELETE FROM panier WHERE id = ?");

        $execute = $deleteArticle->execute(array($id_panier));

        if($execute)
        {
            $msg = 'Article supprimé avec succès';
        }
    }

    if(isset($_POST['update_quantity']))
    {
            $id_quantity = $_GET['id'];

            $updateQuantity = $bdd->prepare("UPDATE panier SET quantity = ? WHERE id = ?");

            $execute = $updateQuantity->execute(array($id_quantity));

            if($execute)
            {
                $msg = 'Quantité modifié avec succès';
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
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option" style="margin-top: 100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="index.php"><i class="fa fa-home"></i> Home</a>
                        <span>Shopping cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

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

    <!-- Shop Cart Section Begin -->
    <section class="shop-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Produit</th>
                                    <th>Prix</th>
                                    <th>Quantité</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <?php
                                $recupProduct = $bdd->query('SELECT * FROM panier');
                                while($panier = $recupProduct->fetch())
                                {
                                    ?>
                                                                <tbody>
                                <tr>
                                    <td class="cart__product__item">
                                        <img width="90" height="90" src="<?= $panier['image'] ?>" alt="picture">
                                        <div class="cart__product__item__title">
                                            <h6><?= $panier['title'] ?></h6>
                                            <div class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart__price"><?= number_format($panier['prix'],2) ?> FCFA</td>
                                    <td class="cart__quantity">
                                        <form action="?id=<?= $panier['id'] ?>" method="post">
                                            <div class="pro-qty">
                                                <input type="text" name="quantity" value="<?= $panier['quantity'] ?>">
                                            </div>
                                            <button name="update_quantity" type="submit" class="btn btn-light"><span class="fa fa-refresh"></span></button>
                                        </form>
                                    </td>
                                    <td class="cart__total"><?= number_format($panier['prix'] * $panier['quantity'],2) ?> FCFA</td>
                                    <td class="cart__close">
                                        <form action="?id=<?= $panier['id'] ?>" method="post">
                                            <button name="delete_panier" style="background-color: #fff;border:none" type="submit"><span class="icon_close"></span></button>
                                        </form>
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
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn">
                        <a href="#">Continue Shopping</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn update__btn">
                        <a href="#"><span class="icon_loading"></span> Update cart</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="discount__content">
                        <h6>Discount codes</h6>
                        <form action="#">
                            <input type="text" placeholder="Enter your coupon code">
                            <button type="submit" class="site-btn">Apply</button>
                        </form>
                    </div>
                </div>
                <?php

                ?>
                <div class="col-lg-4 offset-lg-2">
                    <div class="cart__total__procced">
                        <h6>Cart total</h6>
                        <ul>
                            <?php
                                $recupPrix = $bdd->query('SELECT prix,quantity FROM panier');
                                
                                $calcul = $recupPrix->fetch()
                            ?>
                            <li>Total HT <span><?= $calcul['prix'] ; ?> FCFA</span></li>
                            <li>TVA <span><?= $calcul['prix'] * 0.2; ?> FCFA</span></li>
                            <li>Total TTC <span><?= $calcul['prix']*$calcul['quantity'] * 1.2; ?> FCFA</span></li>
                        </ul>
                        <?php
                            if($recupProduct->rowCount() > 0)
                            {
                                ?>
                            <a href="checkout.php" class="primary-btn">Proceed to checkout</a>
                                <?php
                            }
                            ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Cart Section End -->
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

