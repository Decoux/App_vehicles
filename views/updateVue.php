<?php
include("template/header.php")
?>

<section>
    <div class="container">
        <form class="mt-2 col-md-4 mb-2 mx-auto d-flex flex-column" action="update.php?id=<?php echo $_GET['id']; ?>" method="post">
            Type de vehicule : <select class="custom-select" name="type" id="">
                <option value="Voiture"<?php if ($vehicle->getType() == "Voiture"){ ?>selected<?php } ?>>Voiture</option>
                <option value="Moto"<?php if ($vehicle->getType() == "Moto") { ?>selected<?php } ?>>Moto</option>
                <option value="Camion"<?php if ($vehicle->getType() == "Camion") { ?>selected<?php  } ?>>Camion</option>
            </select>
            Model : <input class="form-control" type="text" name="model" value="<?php echo $vehicle->getModel(); ?>" required >
            Marque : <input class="form-control" type="text" name="mark" value="<?php echo $vehicle->getMark(); ?>" required>
            Couleur : <input class="form-control" type="text" name="color" value="<?php echo $vehicle->getColor(); ?>" required>
            Nombre de portieres : <input class="form-control" type="text" value="<?php echo $vehicle->getDoors(); ?>" name="doors" required>
            <button type="submit" class="mt-2 btn btn-danger">Enregistrer</button>
        </form>
    </div>
</section>
 <?php
include("template/footer.php")
?>