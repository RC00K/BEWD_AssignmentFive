<?php
require('model/db_connect.php');
require('model/vehicles_db.php');
require('model/makes_db.php');
require('model/classes_db.php');
require('model/types_db.php');

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


if($action == 'show_vehicle_list'){
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