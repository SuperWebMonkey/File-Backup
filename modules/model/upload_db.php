<?php
// Add item to the db
function add_upload($name, $type, $data, $directory_id) {
	global $db;
	$query = "insert into upload values('', ?, ?, ?, ?)"; 
	$statement = $db->prepare($query);
	$statement->bindParam(1,$name);
	$statement->bindParam(2,$type);
	$statement->bindParam(3,$data);
	$statement->bindParam(4, $directory_id);
	$statement->execute();
	$statement->closeCursor();
}
// Add items to directory
function add_to_directory($directory_id) {
		global $db;
		$query = '';
}
// Get all items from the db
function get_uploads() {
	$conn = mysqli_connect("localhost", "msg_user", "pa55word", "file_storage");
	if ($conn-> connect_error) {
		die("Connection failed" . $conn -> connect_error);
	}
	$sql = 'select * from upload';
	$result = $conn-> query($sql);
	return $result;
}
// Get Uploads by directory id 
function get_uploads_by_directory($directory_id) {
    global $db;
    $query = 'SELECT * FROM upload
              WHERE upload.directoryID = :directory_id
              ORDER BY fileID';
    $statement = $db->prepare($query);
    $statement->bindValue(':directory_id', $directory_id);
    $statement->execute();
    $uploads = $statement->fetchAll();
    $statement->closeCursor();
    return $uploads;
}
// Get the last item in db
function get_last_upload() {
	$conn = mysqli_connect("localhost", "msg_user", "pa55word", "file_storage");
	if ($conn-> connect_error) {
		die("Connection failed" . $conn -> connect_error);
	}
	$sql = 'select max(fileID) as fileID from upload';
	$result = mysqli_query($con, $sql);
}
// Get the item from the selected id
function get_name($file_id) {
	global $db;
	$query = 'SELECT name FROM upload
			  WHERE upload.fileID = :file_id';
	$statement = $db->prepare($query);
	$statement->bindValue('file_id', $file_id);
	$statement-> execute();
	$name = $statement->fetch();
	return $name[0];
			 
}
// Delete the selected item from db
function delete_upload($file_id) {
	global $db;
    $query = 'DELETE FROM upload
              WHERE fileID = :file_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':file_id', $file_id);
    $statement->execute();
    $statement->closeCursor();
}

?>