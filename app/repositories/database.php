<?php
    require_once '../config/config.php';

    

    class Database {
        private $db_host = DB_HOST;
        private $db_name = DB_NAME;
        private $db_user = DB_USER;
        private $db_pass = DB_PASS;
        private $connect;
        private $error;

        public function __construct()
        {
        }

        // Connction to data base
        public function connectDB() {
            try {
                $this->connect = new PDO("mysql:host=" . $this->db_host . ";dbname=" . $this->db_name, $this->db_user , $this->db_pass );
                $this->connect->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
                return $this->connect;
                echo "Connected";
            } catch (PDOException $e) {
                $this->error = $e->getMessage();
                return $this->error;  
                echo "Connected";
            }

        }






    }






?>