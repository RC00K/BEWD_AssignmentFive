<?php
switch($action) {
	case 'show_add_vehicle':
		VehicleDB::add_vehicle($year, $price, $model, $type_id, $class_id, $make_id);
		header('Location: .?action=add_vehicle');
		break;
	case 'delete_vehicle':
		VehicleDB::delete_vehicle($id);
		header('Location: .?action=show_vehicle_list');
	case 'add_vehicle':
		include('view/add_vehicle_form.php');
	default:
		break;
}
?>