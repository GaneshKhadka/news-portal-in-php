<?php
    $role = $_SESSION['role'];
    if($role != 'admin'){
        redirect('./dashboard.php','warning','You do not have privilege to access this page.');
    }