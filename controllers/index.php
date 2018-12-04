<?php
require '../entities/Vehicle.php';
require '../entities/Car.php';
require '../entities/Bike.php';
require '../entities/Truck.php';
require '../models/Database.php';
require '../models/VehicleManager.php';

$db = Database::DB();
$manager = new VehicleManager($db);
/**
 * Security if is not null we create object
 */
if(!empty($_POST['type'])){
    if(!empty($_POST['model'])){
        if(!empty($_POST['mark'])){
            if(!empty($_POST['color'])){
                $doors = intval($_POST['doors']);
                if($doors >= 0){
                    if($_POST['type'] == 'Voiture'){
                        $car = new Car([
                            "color"=> addslashes(strip_tags($_POST['color'])),
                            "type"=>addslashes(strip_tags($_POST['type'])),
                            "mark" => addslashes(strip_tags($_POST['mark'])),
                            "model" => addslashes(strip_tags($_POST['model'])),
                            "doors" => addslashes(strip_tags($_POST['doors'])),
                        ]);
                        $manager->addVehicles($car);
                    }
                    if ($_POST['type'] == 'Camion') {
                        $truck = new Truck([
                            "color" => addslashes(strip_tags($_POST['color'])),
                            "type" => addslashes(strip_tags($_POST['type'])),
                            "mark" => addslashes(strip_tags($_POST['mark'])),
                            "model" => addslashes(strip_tags($_POST['model'])),
                            "doors" => addslashes(strip_tags($_POST['doors'])),
                        ]);
                        $manager->addVehicles($truck);
                    }
                    if ($_POST['type'] == 'Moto') {
                        $bike = new Bike([
                            "color" => addslashes(strip_tags($_POST['color'])),
                            "type" => addslashes (strip_tags($_POST['type'])),
                            "mark" => addslashes (strip_tags($_POST['mark'])),
                            "model" =>addslashes(strip_tags($_POST['model'])),
                            "doors" => addslashes (strip_tags($_POST['doors'])),
                        ]);
                        $manager->addVehicles($bike);
                    }
                }
            }
        }
    }
}

$allVehicles = $manager->getVehicles();

if(isset($_GET['id'])){
    $id = intval($_GET['id']);
    $manager->delete($id);
    header('Location: index.php');
}



include "../views/indexVue.php";

 ?>
