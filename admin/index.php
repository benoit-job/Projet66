<?php include "head.php" ?>

<?php
    $recupArtisan = $bdd->query('SELECT * FROM artisans ORDER BY id DESC');
 ?>

<div class="col-lg-10 offset-lg-2">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Dashboard</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
          <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
          <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
        </div>
        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
          <span data-feather="calendar"></span>
          This week
        </button>
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
      <canvas class="my-4 w-100" id="myChart" width="900" height="50"></canvas>
      <h2>Artisans</h2>
      <div class="col-lg-12">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Photo</th>
              <th scope="col">Nom et prénom</th>
              <th scope="col">Email</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <?php
              if($recupArtisan->rowCount() > 0)
                  {
                      ?>
                    <?php
                      while($artisan = $recupArtisan->fetch())
                      {
                      ?>
          <tbody>
            <tr>
              <td><img width="90" height="90" src="../photo_artisans/<?= $artisan['photo'] ?>" alt=""></td>
              <td><?= $artisan['nom']?> <?= $artisan['prenom']?></td>
              <td><strong><?= $artisan['email']?></strong></td>
              <td>
                <form action="" method="POST">
                  <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                </form>
              </td>
            </tr>
          </tbody>
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
        </table>
        <div>
          {{$users->links()}}
        </div>
      </div>
</div>

<?php include "foot.php" ?>



