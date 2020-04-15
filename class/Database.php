<?php

   abstract class Database{
        protected $conn = null;
        protected $sql = "";
        protected $stmt = "";

        protected $table = null;

        public function __construct()
        {
            try{
                $this->conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";", DB_USER, DB_PASSWORD);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
                $this->sql = "SET NAMES utf8";
                $this->stmt = $this->conn->prepare($this->sql);
                $this->stmt;
            }catch(PDOException $e){
                $msg = date('Y-m-d h:i A').", PDO Connection: ".$e->getMessage()."\r\n";
                error_log($msg, 3, ERROR_LOG);
            }catch(Exception $e){
                $msg = date('Y-m-d h:i A').", PDO Connection: ".$e->getMessage()."\r\n";
                error_log($msg, 3, ERROR_LOG);
            }
        }
        final protected function select($args = array(), $is_debug=false){
            try{
                $this->sql = "SELECT";
                if($is_debug){
                    debug($args);
                    debug($this->sql, true);
                }

            }catch(PDOException $e){
                $msg = date('Y-m-d h:i A').", PDO Select: ".$e->getMessage()."\r\n";
                error_log($msg, 3, ERROR_LOG);
            }catch(Exception $e){
                $msg = date('Y-m-d h:i A').", PDO Select: ".$e->getMessage()."\r\n";
                error_log($msg, 3, ERROR_LOG);
            }
        }
        // function update();
        // function insert();
        // function delete();
    }