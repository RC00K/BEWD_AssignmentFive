<?php
require('../model/db_connect.php');
require('../model/vehicles_db.php');
require('../model/makes_db.php');
require('../model/classes_db.php');
require('../model/types_db.php');

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

$year = filter_input(INPUT_POST, 'year',FILTER_VALIDATE_INT);
if(!$year) {
    $year = filter_input(INPUT_GET, 'year', FILTER_VALIDATE_INT);
}

$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_INT);
if(!$price) {
    $price = filter_input(INPUT_GET, 'price', FILTER_VALIDATE_INT);
}

$model = filter_input(INPUT_POST, 'model', FILTER_SANITIZE_STRING);
if(!$model) {
    $model = filter_input(INPUT_GET, 'model',FILTER_SANITIZE_STRING);
}

$type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING);
if(!$type) {
    $type = filter_input(INPUT_GET, 'type',FILTER_SANITIZE_STRING);
}

$class = filter_input(INPUT_POST, 'class', FILTER_SANITIZE_STRING);
if(!$class) {
    $class = filter_input(INPUT_GET, 'class', FILTER_SANITIZE_STRING);
}

$make = filter_input(INPUT_POST, 'make', FILTER_SANITIZE_STRING);
if(!$make) {
    $make = filter_input(INPUT_GET, 'make', FILTER_SANITIZE_STRING);
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
else if($action == 'show_add_vehicle' || $action == 'delete_vehicle' || $action == 'add_vehicle') {
    $types = TypeDB::get_types();
    $makes = MakeDB::get_makes();
    $classes = ClassDB::get_classes();
    include('controllers/vehicles.php');
} 
else if($action == 'add_type' || $action == 'delete_type' || $action == 'edit_type') {
    $types = TypeDB::get_types();
    include('controllers/types.php');
} 
else if($action == 'add_make' || $action == 'delete_make' || $action == 'edit_makes') {
    $makes = MakeDB::get_makes();
    include('controllers/makes.php');
} 
else if($action == 'add_class' || $action == 'delete_class' || $action == 'edit_class') {
    $classes = ClassDB::get_classes();
    include('controllers/classes.php');
} 

?>