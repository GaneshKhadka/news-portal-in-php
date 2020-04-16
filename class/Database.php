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
                $this->sql = "SELECT ";
                if(isset($args['fields']) && !empty($args['fields'])){
                    if(is_array($args['fields'])){
                        $this->sql .= implode(", ",$args['fields']);
                    }else{
                        $this->sql .= $args['fields'];
                    }
                }else{
                    $this->sql .= " * ";
                }

                $this->sql .= " FROM ";

                if(!isset($this->table) || $this->table == null){
                    throw new Exception("Table not set.");
                }

                $this->sql .= $this->table;

                /** JOIN OPERAION */
                /** JOIN OPERAION */


                /** WHERE OPERAION */
                if(isset($args['where']) && !empty($args['where'])){
                    if(is_string($args['where'])){

                        $this->sql .= " WHERE ".$args['where'];

                    } else{
                        $temp = array();
                        foreach($args['where'] as $column_name => $value){
                            $str = $column_name." = :".$column_name;
                            $temp[] = $str;
                        }
                        $this->sql .= " WHERE ".implode(" AND ", $temp);
                    }
                }
                /** WHERE OPERAION */

                if($is_debug){
                    debug($args);
                    debug($this->sql, true);
                }

                $this->stmt = $this->conn->prepare($this->sql);

                if(isset($args['where']) && !empty($args['where']) && is_array($args['where'])){
                    foreach($args['where'] as $column_name => $value){
                        if(is_int($value)){
                            $param = PDO::PARAM_INT;
                        } else if(is_bool($value)){
                            $param = PDO::PARAM_BOOL;
                        } else{
                            $param = PDO::PARAM_STR;
                        }

                        if(isset($param)){
                            $this->stmt->bindValue(":".$column_name,$value,$param);
                        }
                    }
                }


                $this->stmt->execute();
                $data = $this->stmt->fetchAll(PDO::FETCH_OBJ);
                return $data;


            }catch(PDOException $e){
                $msg = date('Y-m-d h:i A').", PDO Select: ".$e->getMessage()."\r\n";
                error_log($msg, 3, ERROR_LOG);
            }catch(Exception $e){
                $msg = date('Y-m-d h:i A').", PDO Select: ".$e->getMessage()."\r\n";
                error_log($msg, 3, ERROR_LOG);
            }
        }

        final protected function update($data = array(), $args = array(), $is_debug=false){
            try{
                $this->sql = "UPDATE ";

                if(!isset($this->table) || $this->table == null){
                    throw new Exception("Table not set.");
                }

                $this->sql .= $this->table." SET ";

                if(!isset($data) || empty($data)){
                    throw new Exception('Data not set for Update.');
                } else{
                    if(is_string($data)){
                        $this->sql .= $data;
                    }else{
                        $temp = array();
                        foreach($data as $column_name => $value){
                            $str = $column_name." = :_".$column_name;
                            $temp[] = $str;
                        }
                        $this->sql .= implode(", ", $temp);
                    }
                }

                /** JOIN OPERAION */
                /** JOIN OPERAION */


                /** WHERE OPERAION */
                if(isset($args['where']) && !empty($args['where'])){
                    if(is_string($args['where'])){

                        $this->sql .= " WHERE ".$args['where'];

                    } else{
                        $temp = array();
                        foreach($args['where'] as $column_name => $value){
                            $str = $column_name." = :".$column_name;
                            $temp[] = $str;
                        }
                        $this->sql .= " WHERE ".implode(" AND ", $temp);
                    }
                }
                /** WHERE OPERAION */

                if($is_debug){
                    debug($args);
                    debug($this->sql, true);
                }

                $this->stmt = $this->conn->prepare($this->sql);


                if(isset($data) && !empty($data) && is_array($data)){
                    foreach($data as $column_name => $value){
                        if(is_int($value)){
                            $param = PDO::PARAM_INT;
                        } else if(is_bool($value)){
                            $param = PDO::PARAM_BOOL;
                        } else{
                            $param = PDO::PARAM_STR;
                        }

                        if(isset($param)){
                            $this->stmt->bindValue(":_".$column_name,$value,$param);
                        }
                    }
                }

                if(isset($args['where']) && !empty($args['where']) && is_array($args['where'])){
                    foreach($args['where'] as $column_name => $value){
                        if(is_int($value)){
                            $param = PDO::PARAM_INT;
                        } else if(is_bool($value)){
                            $param = PDO::PARAM_BOOL;
                        } else{
                            $param = PDO::PARAM_STR;
                        }

                        if(isset($param)){
                            $this->stmt->bindValue(":".$column_name,$value,$param);
                        }
                    }
                }


                return $this->stmt->execute();
                // $data = $this->stmt->fetchAll(PDO::FETCH_OBJ);
                // return $data;


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