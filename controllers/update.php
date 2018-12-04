<?php 
require '../models/VehicleManager.php';
require '../models/Database.php';
require '../entities/Vehicle.php';
require '../entities/Bike.php';
require '../entities/Car.php';
require '../entities/Truck.php';
$db = Database::DB();
$manager = new VehicleManager($db);

$vehicle = $manager->getVehicle($_GET['id']);
if (!empty($_POST['type'])) {
    if (!empty($_POST['model'])) {
        if (!empty($_POST['mark'])) {
            if (!empty($_POST['color'])) {
                $doors = intval($_POST['doors']);
                if ($doors >= 0) {
                    if ($_POST['type'] == 'Voiture') {
                        $car = new Car([
                            'id' => $vehicle->getId(),
                            "color" => addslashes(strip_tags($_POST['color'])),
                            "type" => addslashes(strip_tags ($_POST['type'])),
                            "mark" => addslashes(strip_tags ($_POST['mark'])),
                            "model" => addslashes(strip_tags ($_POST['model'])),
                            "doors" => addslashes(strip_tags ($_POST['doors']))
                        ]);
                        $manager->update($car);
                        header('Location: index.php');
                    }
                    if ($_POST['type'] == 'Camion') {
                        $truck = new Truck([
                            'id' => $vehicle->getId(),
                            "color" => addslashes(strip_tags($_POST['color'])),
                            "type" => addslashes(strip_tags($_POST['type'])),
                            "mark" => addslashes(strip_tags($_POST['mark'])),
                            "model" => addslashes(strip_tags($_POST['model'])),
                            "doors" => addslashes(strip_tags($_POST['doors']))
                        ]);
                        $manager->update($truck);
                        header('Location: index.php');
                    }
                    if ($_POST['type'] == 'Moto') {
                        $bike = new Bike([
                            'id' => $vehicle->getId(),
                            "color" => addslashes(strip_tags($_POST['color'])),
                            "type" => addslashes(strip_tags($_POST['type'])),
                            "mark" => addslashes(strip_tags($_POST['mark'])),
                            "model" => addslashes(strip_tags($_POST['model'])),
                            "doors" => 0
                        ]);
                        $manager->update($bike);
                        header('Location: index.php');
                    }
                }
            }
        }
    }
}
require "../views/updateVue.php";