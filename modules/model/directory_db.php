<?php
function get_directory() {
    global $db;
    $query = 'SELECT * FROM folder
              ORDER BY directoryID';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;    
}

function get_all_directories() {
	global $db;
	$query = 'SELECT * FROM folder';
	$statement = $db->prepare($query);
	$statement->execute();
	$directories = $statement->fetchAll();
	$statement->closeCursor();
	return $directories;
	
}

function get_directory_name($directory_id) {
    global $db;
    $query = 'SELECT * FROM folder
              WHERE directoryID = :directory_id';    
    $statement = $db->prepare($query);
    $statement->bindValue(':directory_id', $directory_id);
    $statement->execute();    
    $directory = $statement->fetch();
    $statement->closeCursor();    
    $directory_name = $directory['directoryName'];
    return $directory_name;
}

function add_directory($name) {
    global $db;
    $query = 'INSERT INTO folder (directoryName)
              VALUES (:name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->execute();
    $statement->closeCursor();    
}

function delete_directory($directory_id) {
    global $db;
    $query = 'DELETE FROM folder
              WHERE directoryID = :directory_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':directory_id', $directory_id);
    $statement->execute();
    $statement->closeCursor();
}
?>