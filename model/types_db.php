<?php
class TypeDB {
public static function get_types() {
	global $db;
	$query = 'SELECT * FROM types
			  ORDER BY type_id';
	$statement = $db->prepare($query);
	$statement->execute();
	$types = $statement->fetchAll();
	$statement->closeCursor();
	return $types;
}

public static function add_type($type) {
	global $db;
	$query = 'INSERT INTO types (type) VALUES (:type)';
	$statement = $db->prepare($query);
	$statement->bindValue(':type', $type);
	$statement->execute();
	$statement->closeCursor();
}

public static function delete_type($type_id) {
	global $db;
	$query = 'DELETE FROM types WHERE type_id = :type_id';
	$statement = $db->prepare($query);
	$statement->bindValue(':type_id', $type_id);
	$statement->execute();
	$statement->closeCursor();
}
}