
<?php include "head.php" ?>
<?php
if(isset($_POST['valider']))
{
  if(isset($_POST['title']))
  {
    if(!empty($_POST['title']))
    {
      $title = htmlspecialchars($_POST['title']);

      $insertCategory = $bdd->prepare('INSERT INTO category(title) VALUES(?)');

      $insertCategory->execute(array($title));

      $msg = 'Categorie crée avec succès';
    }
  }
}
    $recupCategory = $bdd->query('SELECT * FROM category');
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
      <h3>CREATION DE CATEGORIE</h3>
      <div class="col-lg-4">
        <form action="" method="post">
          <div class="form-group">
            <label for="">Titre de la catégorie</label>
            <input type="text" name="title" class="form-control">
          </div>
          <div class="form-group">
            <button class="btn btn-success" type="submit" name="valider">Créer</button>
          </div>
        </form>
      </div>
      <div class="col-lg-12">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Catégorie</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <?php
              if($recupCategory->rowCount() > 0)
                  {
                      ?>
                    <?php
                      while($category = $recupCategory->fetch())
                      {
                      ?>
          <tbody>
            <tr>
              <td><strong><?= $category['title'] ?></strong></td>
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
          {{$categories->links()}}
        </div>
      </div>
</div>

<?php include "foot.php" ?>



