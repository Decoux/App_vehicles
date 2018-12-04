<?php
  include("template/header.php")
 ?>

<section>
  <div class="container">
    <form class="mt-2 col-md-4 mb-2 mx-auto d-flex flex-column" action="index.php" method="post">
      Type de vehicule : <select class="custom-select" name="type" id="">
        <option value="Voiture">Voiture</option>
        <option value="Moto">Moto</option>
        <option value="Camion">Camion</option>
      </select>
      Model : <input class="form-control" type="text" name="model" required>
      Marque : <input class="form-control" type="text" name="mark" required>
      Couleur : <input class="form-control" type="text" name="color" required>
      Nombre de portieres : <input class="form-control" type="text" name="doors" required>
      <button type="submit" class="mt-2 btn btn-danger">Enregistrer</button>
    </form>
    <div class="row d-flex justify-content-center">
    <?php if(isset($allVehicles)){ ?>
      <?php foreach($allVehicles as $vehicles){ ?>
        <div class="row col-md-12 m-2">
        <a class="border border-dark col-10 rounded d-flex bg-secondary text-white font-weight-bold justify-content-center" href="details.php?id=<?php echo $vehicles->getId(); ?>">
          <div>
            Type de vehicule : <?php echo $vehicles->getType(); ?><br/>
            Model : <?php echo $vehicles->getModel(); ?><br/>
            Marque : <?php echo $vehicles->getMark(); ?><br/>
            
              
              
          </div>
        </a>
        <div>
          <a class="text-white btn col-12 bg-info" href="update.php?id=<?php echo $vehicles->getId(); ?>">Modifier</a>
          <form class="" action="index.php?id=<?php echo $vehicles->getId(); ?>" method="post">
              <input type="submit" name="delete" value="Supprimer" class="text-white p-1 btn col-12 bg-danger">
          </form>
        </div>  
      </div>
        <?php } ?>
      <?php } ?>
      </div>
      
  </div>
</section>

 <?php
   include("template/footer.php")
  ?>
