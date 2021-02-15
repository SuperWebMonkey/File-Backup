<?php
function get_files_by_directory($directory_id) {
    global $db;
    $query = 'SELECT * FROM files
              WHERE files.directoryID = :directory_id
              ORDER BY fileID';
    $statement = $db->prepare($query);
    $statement->bindValue(':directory_id', $directory_id);
    $statement->execute();
    $files = $statement->fetchAll();
    $statement->closeCursor();
    return $files;
}

function get_file($file_id) {
    global $db;
    $query = 'SELECT * FROM files
              WHERE fileID = :file_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':file_id', $file_id);
    $statement->execute();
    $file = $statement->fetch();
    $statement->closeCursor();
    return $file;
}

function delete_file($file_id) {
    global $db;
    $query = 'DELETE FROM files
              WHERE fileID = :file_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':file_id', $file_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_file($directory_id, $fileName) {
    global $db;
    $query = 'INSERT INTO files
                 (directoryID, fileName)
              VALUES
                 (:directory_id, :fileName)';
    $statement = $db->prepare($query);
    $statement->bindValue(':directory_id', $directory_id);
	$statement->bindValue(':fileName', $fileName);
    $statement->execute();
    $statement->closeCursor();
}

?>