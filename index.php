<?php
$lifetime = 60 * 60 * 24 * 14;
session_set_cookie_params($lifetime, '/');
session_start();

require('model/db_connect.php');
require('model/vehicles_db.php');
require('model/makes_db.php');
require('model/classes_db.php');
require('model/types_db.php');

$firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
if(!$firstname) {
    $firstname = filter_input(INPUT_GET, 'firstname', FILTER_SANITIZE_STRING);
}

$make_id = filter_input(INPUT_POST, 'make_id',FILTER_VALIDATE_INT);
if(!$make_id) {
    $make_id = filter_input(INPUT_GET, 'make_id',FILTER_VALIDATE_INT);
}

$type_id = filter_input(INPUT_POST, 'type_id',FILTER_VALIDATE_INT);
if(!$type_id) {
    $type_id = filter_input(INPUT_GET, 'type_id',FILTER_VALIDATE_INT);
}

$class_id = filter_input(INPUT_POST, 'class_id',FILTER_VALIDATE_INT);
if(!$class_id) {
    $class_id = filter_input(INPUT_GET, 'class_id',FILTER_VALIDATE_INT);
}

$sort = filter_input(INPUT_POST, 'sort',FILTER_SANITIZE_STRING);
if(!$sort) {
    $sort = filter_input(INPUT_GET, 'sort',FILTER_SANITIZE_STRING);
}

$action = filter_input(INPUT_POST, 'action',FILTER_SANITIZE_STRING);
if(!$action){
    $action=filter_input(INPUT_GET,'action',FILTER_SANITIZE_STRING);
    if(!$action){
        $action='show_vehicle_list';
    }
}

// User Info
if($firstname) {
    $_SESSION['userid'] = $firstname;
    $userid = $_SESSION['userid'];
} else {
    $firstname = false;
}


if($action == 'show_vehicle_list'){
    error_reporting(0);

    $userid = $_SESSION['userid'];
    if($type_id){
      
        $vehicles=VehicleDB::get_vehicles_by_type($type_id,$sort);
       
    }
    else if($make_id){        
        $vehicles=VehicleDB::get_vehicles_by_make($make_id,$sort); 
        
    }
    else if($class_id){
        $vehicles=VehicleDB::get_vehicles_by_class($class_id,$sort); 
    }
    else{
       
        $vehicles=VehicleDB::get_vehicles($sort); 
    }

    
    $types=TypeDB::get_types();
    $makes= MakeDB::get_makes();
    $classes=ClassDB::get_classes();
    include('view/vehicle_list.php');
}
// Register
else if($action == 'register') {
    error_reporting(0);
    include('view/register.php');
}
// Logout
else if($action == 'logout') {
    error_reporting(0);
    $userid = $_SESSION['userid'];
    include('view/logout.php');
}