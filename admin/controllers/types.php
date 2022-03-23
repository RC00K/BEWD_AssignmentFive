<?php
switch($action) {
	case 'add_type':
		TypeDB::add_type($type);
		header('Location: .?action=edit_type');
		break;
	case 'delete_type':
		TypeDB::delete_type($type_id);
		header('Location: .?action=edit_type');
	case 'edit_type':
		include('view/type_list.php');
	default:
		break;
}
?>