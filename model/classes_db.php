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

public static function add_class($class) {
	global $db;
	$query = 'INSERT INTO classes (class) VALUES (:class)';
	$statement = $db->prepare($query);
	$statement->bindValue(':class', $class);
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