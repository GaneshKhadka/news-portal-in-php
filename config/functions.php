<?php
    function debug($data,$is_exit = false){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        if($is_exit == true){
            exit;
        }
    }

    function setSession($key, $msg){
        if(!isset($_SESSION)){
                session_start();
        }
        $_SESSION[$key] = $msg;
    }

    function redirect($path, $session_key = null, $msg=null){

        if($session_key !== null){
            setSession($session_key,$msg);
        }

        header('location: '.$path);
        exit;
    }

    function flash(){
        if(isset($_SESSION['success']) && !empty($_SESSION['success'])){
            echo "<p class='alert alert-success'>".$_SESSION['success']."</p>";
            unset($_SESSION['success']);
        }
        if(isset($_SESSION['warning']) && !empty($_SESSION['warning'])){
            echo "<p class='alert alert-warning'>".$_SESSION['warning']."</p>";
            unset($_SESSION['warning']);
        }
        if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
            echo "<p class='alert alert-danger'>".$_SESSION['error']."</p>";
            unset($_SESSION['error']);
        }
    }