<?php
class ClassDB {
public static function get_classes() {
	global $db;
	$query = 'SELECT * FROM classes
			  ORDER BY class_id';
	$statement = $db->prepare($query);
	$statement->execute();
	$classes = $statement->fetchAll();
	$statement->closeCursor();
	return $classes;
}

public static function add_class($class_name) {
	global $db;
	$query = 'INSERT INTO classes (class_name) VALUES (:class_name)';
	$statement = $db->prepare($query);
	$statement->bindValue(':class_name', $class_name);
	$statement->execute();
	$statement->closeCursor();
}

public static function delete_class($class_id) {
	global $db;
	$query = 'DELETE FROM classes WHERE class_id = :class_id';
	$statement = $db->prepare($query);
	$statement->bindValue(':class_id', $class_id);
	$statement->execute();
	$statement->closeCursor();
}
}
?>