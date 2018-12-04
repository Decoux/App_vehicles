<?php

class VehicleManager{
    private $_db;
    
    public function __construct(PDO $db){
        $this->setDb($db);
    }
    /**
     * Get the value of _db
     */ 
    public function getDb()
    {
        return $this->_db;
    }

    /**
     * Set the value of _db
     *
     * @return  self
     */ 
    public function setDb(PDO $db)
    {
        $this->_db = $db;

        return $this;
    }

    public function addVehicles(Vehicle $vehicle){
        $req = $this->getDb()->prepare('INSERT INTO vehicle(color, type, mark, model, doors) VALUES (:color, :type, :mark, :model, :doors)');
        $req->bindValue(':color', $vehicle->getColor(), PDO::PARAM_STR);
        $req->bindValue(':type', $vehicle->getType(), PDO::PARAM_STR);
        $req->bindValue(':mark', $vehicle->getMark(), PDO::PARAM_STR);
        $req->bindValue(':model', $vehicle->getModel(), PDO::PARAM_STR);
        $req->bindValue(':doors', $vehicle->getDoors(), PDO::PARAM_INT);
        $req->execute();
    }

    public function getVehicles(){
        $req = $this->getDb()->query('SELECT * FROM vehicle');
        $data_vehicles = $req->fetchAll(PDO::FETCH_ASSOC);
        if(!empty($data_vehicles)){
            foreach ($data_vehicles as $vehicle) {
                if (in_array('car', $vehicle)) {
                    $arrayOfVehicle[] = new Car($vehicle);
                } elseif (in_array('truck', $vehicle)) {
                    $arrayOfVehicle[] = new Truck($vehicle);
                } else {
                    $arrayOfVehicle[] = new Bike($vehicle);
                }
            }
            return $arrayOfVehicle;
        }
    }

    public function getVehicle(int $id){
        $req = $this->getDb()->prepare('SELECT * FROM vehicle WHERE id = :id');
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $data_vehicle = $req->fetch(PDO::FETCH_ASSOC);
        if(in_array('Voiture', $data_vehicle)){
            $vehicle = new Car($data_vehicle);
        } elseif (in_array('Camion', $data_vehicle)) {
            $vehicle = new Truck($data_vehicle);
        } else {
            $vehicle = new Bike($data_vehicle);
        }
        return $vehicle;
    }

    public function update($vehicle){
        $req = $this->getDb()->prepare('UPDATE vehicle SET color = :color, type = :type, mark = :mark, model = :model, doors = :doors WHERE id = :id');
        $req->bindValue(':color', $vehicle->getColor(), PDO::PARAM_STR);
        $req->bindValue(':type', $vehicle->getType(), PDO::PARAM_STR);
        $req->bindValue(':mark', $vehicle->getMark(), PDO::PARAM_STR);
        $req->bindValue(':model', $vehicle->getModel(), PDO::PARAM_STR);
        $req->bindValue(':doors', $vehicle->getDoors(), PDO::PARAM_INT);
        $req->bindValue(':id', $vehicle->getId(), PDO::PARAM_INT);
        $req->execute();

    }

    public function delete(int $id){
        $req = $this->getDb()->prepare('DELETE FROM vehicle WHERE id = :id');
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
    }


}