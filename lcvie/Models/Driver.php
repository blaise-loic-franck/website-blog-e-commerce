<?php

 class Driver{

    private static $db;

    
    private static function getDb()
    {
        if(self::$db === null){
            try{
                self::$db = new PDO('mysql:host=localhost; dbname=lcvie','root','');
                self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              
            }catch(PDOException $e){
                die($e->getMessage());
            }
        }
        return self::$db;
    }

    protected function getRequest($sql, $params = null){

        $result = self::getDb()->prepare($sql);
        $result->execute($params);

        return $result;
    } 
}



?>


