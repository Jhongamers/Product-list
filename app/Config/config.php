<?php

namespace App\Config;
use \PDO;
use \PDOException;

define('DB_HOST','localhost');
define('DATABASE','product-list');
define('USER','root');
define('PASS','');

class config{
        protected $conn;

        public function __construct(){
             $this->connectDatabase();
        }

        public function connectDatabase()
        {
            try
            {
                header('Content-Type: charset=utf-8'); 
                $this->conn = new PDO('mysql:host='.DB_HOST.';dbname='.DATABASE.';charset=utf8', USER, PASS);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e)
            {
                echo "ERROR".$e->getMessage();
                die();
            }

        }
    }
