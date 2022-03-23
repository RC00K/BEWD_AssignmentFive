<?php
switch($action) {
	case 'add_class':
		ClassDB::add_class($class);
		header('Location: .?action=edit_class');
		break;
	case 'delete_class':
		ClassDB::delete_class($class_id);
		header('Location: .?action=edit_class');
	case 'edit_class':
		include('view/class_list.php');
	default:
		break;
}
?>