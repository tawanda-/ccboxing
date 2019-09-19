<?php

    function get_db_connection() {
        $pdo;
        try{
            $pdo = new PDO(
                "mysql:host=localhost;dbname=esikogxy_ccboxing;charset=utf8", 
                "esikogxy_ccb", "ccb0xing", [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::ATTR_PERSISTENT => true,
                ]
            );
        }catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
        }
        
        return $pdo;
    }
?>