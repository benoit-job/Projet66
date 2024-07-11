        <!-- Page Preloder -->
        <div id="preloder">
          <div class="loader"></div>
        </div>
        <?php
        $panier = $bdd->query('SELECT * FROM panier');

        $c = $panier->fetchAll();
        ?>
<div class="offcanvas-menu-overlay"></div>
      <div class="offcanvas-menu-wrapper" style="top:0">
          <div class="offcanvas__close">+</div>
          <ul class="offcanvas__widget">
              <li><span class="icon_search search-switch"></span></li>
              <li><a href="shopCart.php"><span class="icon_bag_alt"></span>
                <div class="tip"><span class="bi-badge badge-fill">2</span></div>
              </a></li>
               <li><a href="#"><img src="img/avatar.jpg" width="50" height="50" style="border-radius: 50%" alt=""></a></li>
          </ul>
          <div class="offcanvas__logo">
              <a href="index.php"><img src="/img/logo.png" alt=""></a>
          </div>
          <div id="mobile-menu-wrap"></div>
          <div class="offcanvas__auth">
          <?php if(!isset($_SESSION['contact'])):?>
            <a href="espace_connexion.php">Connexion</a>
            <a href="espace_inscription.php">Incription</a>   
          <?php else:?>
            <a href="logout.php">Déconnexion <i class="fa fa-sign-out"></i></a>
          <?php endif;?>
          </div>
      </div>
      <!-- Offcanvas Menu End -->
  
      <!-- Header Section Begin -->
      <header class="header" style="position:fixed;width:100%;z-index:20;top:0;margin-bottom: 200px;background-color:gray">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-xl-3 col-lg-2">
                      <div class="header__logo">
                          <a href="list_artisans.php"><img src="img/logo.png" alt=""></a>
                      </div>
                  </div>
                  <div class="col-xl-6 col-lg-7">
                      <nav class="header__menu">
                          <ul>
                              <li class="active"><a href="index.php">ACCUEIL</a></li>
                              <li><a href="articles.php">ARTICLES</a></li>
                              <li><a href="create_product.php">CREER UN ARTICLE</a></li>
                            <li><a href="blog.php">Blog</a></li>
                            <li><a href="contact.php">Contact</a></li>
                          </ul>
                      </nav>
                  </div>
                  <div class="col-lg-3">
                      <div class="header__right">
                          <div class="header__right__auth">
                          <?php if(!isset($_SESSION['contact'])):?>
                            <a href="espace_connexion.php">Connexion</a>
                            <a href="espace_inscription.php">Incription</a> 
                          <?php else:?>
                            <a href="logout.php">Déconnexion <i class="fa fa-sign-out"></i></a>
                          <?php endif;?>
                          </div>
                          <ul class="header__right__widget">
                              <li><span class="icon_search search-switch"></span></li>
                              <li><a href="shopCart.php"><span class="icon_bag_alt"></span>
                                <div class="tip"><span class="bi-badge badge-fill"><?= count($c) ?></span></div>
                              </a></li>
                              <?php if(!isset($_SESSION['contact'])):?>
                                <li><a href="#"><img src="img/avatar.jpg" width="50" height="50" style="border-radius: 50%" alt=""></a></li>
                              <?php else:?>
                                <?php
                                if($_SESSION['contact'])
                                {
                                    ?>
                                        <li><a href="#"><img src="img/avatar.jpg" width="50" height="50" style="border-radius: 50%" alt=""></a></li>
                                    <?php
                                }else{
                                    ?>
                                    <li><a href="#"><img src="img/avatar.jpg" width="50" height="50" style="border-radius: 50%" alt=""></a></li>
                                    <?php
                                }
                                 ?>
                               <?php endif;?>
                          </ul>
                      </div>
                  </div>
              </div>
              <div class="canvas__open">
                  <i class="fa fa-bars"></i>
              </div>
          </div>
      </header>
