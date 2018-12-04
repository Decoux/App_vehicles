<?php
require '../models/VehicleManager.php';
require '../entities/Vehicle.php';
require '../entities/Bike.php';
require '../entities/Car.php';
require '../entities/Truck.php';
require '../models/Database.php';
$db = Database::DB();
$manager = new VehicleManager($db);
$vehicle = $manager->getVehicle($_GET['id']);
/**
 * If post delete is defined
 */
if (isset($_POST['delete'])) {
    $id = intval($_GET['id']);
    $manager->delete($id);
    header('Location: index.php');
}
include "../views/detailsVue.php";