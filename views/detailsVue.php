<?php
include("template/header.php")
?>
<section>
    <div class="container">
        <div class="row mt-5 d-flex justify-content-center">
                <div class="border border-dark col-md-4 rounded d-flex bg-secondary text-white font-weight-bold justify-content-center">
                    Type de vehicule : <?php echo $vehicle->getType(); ?><br/>
                    Model : <?php echo $vehicle->getModel(); ?><br/>
                    Marque : <?php echo $vehicle->getMark(); ?><br/>
                    Couleur : <?php echo $vehicle->getColor(); ?><br/>
                    Nombre de porte : <?php echo $vehicle->getDoors(); ?><br/>
                </div>
                
        </div>
        <a class="btn col-md-2 mx-auto bg-info border border-dark text-white row mt-5 d-flex justify-content-center" href="update.php?id=<?php echo $vehicle->getId(); ?>">Modifier</a>
        <form class="row mt-5 d-flex justify-content-center" action="details.php?id=<?php echo $vehicle->getId(); ?>" method="post">
            <input class="btn bg-danger text-white border border-dark" type="submit" name="delete" value="Supprimer">
        </form>
    </div>
</section>
<?php
include("template/footer.php")
?>
