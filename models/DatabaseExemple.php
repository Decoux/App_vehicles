<?php 



class ConnectDB
{
    //connecting setting

    const HOST = "localhost",
        DBNAME = "",
        LOGIN = "",
        PWD = "";

    static public function DB()
    {
        try {
            $db = new PDO('mysql:host=' . self::HOST . ';dbname=' . self::DBNAME, self::LOGIN, self::PWD);
            return $db;
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

    }

}