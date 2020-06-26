<?php

class DB {

	
    private $connection;

    public function getConnection($dbname){

        $this->connection = null;

        try{
            $this->connection = new PDO("sqlsrv:Server=".DB_SERVER.";Database=".$dbname,DB_USERNAME,DB_PASSWORD);
        }catch(PDOException $exception){
            echo "Connection failed: " . $exception->getMessage();
        }

        return $this->connection;
    }
}



?>