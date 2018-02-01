<?php

    class Database
    {
        private static $dbhost = "localhost";
        private static $dbuser = "root";
        private static $dbpass = "";
        private static $dbname = "africacodes";
        private static $connection;

        private function __construct() {}

        public static function connection() 
        {
            if(static::$connection)
            {

                return static::$connection;
            }
            else 
            
            {
                try 
                {
                    return static::$connection = new PDO("mysql:host=".static::$dbhost.";dbname=".static::$dbname, static::$dbuser, static::$dbpass);
                }
                catch(PDOException $e) 
                {
                    echo 'ERROR: ' . $e->getMessage();
                }
            }
        }


    }
    