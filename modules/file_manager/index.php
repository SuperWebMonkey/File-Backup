<?php
require('../model/database.php');
require('../model/file_db.php');
require('../model/directory_db.php');
require('../model/upload_db.php');
// Start of functions
function initialize() {
	$action = filter_input(INPUT_POST, 'action');
	if ($action == NULL) {
		$action = filter_input(INPUT_GET, 'action');
		if ($action == NULL) {
			$action = 'list_files';
		}
	}
	return $action;
}

//	List files in list page.
function listFiles() {
	$directory_id = filter_input(INPUT_GET, 'directory_id', 
            FILTER_VALIDATE_INT);
    if ($directory_id == NULL || $directory_id == FALSE) {
        $directory_id = 1;
    }
    $directory_name = get_directory_name($directory_id);
    $directories = get_directory();
    $files = get_uploads_by_directory($directory_id);
	//$files = get_uploads();
    include('file_list.php');
}
// Add directory
function addDirectory() {
	$name = filter_input(INPUT_POST, 'name');

    // Check If Input is vaild
    if ($name == NULL) {
        $error = "Invalid directory name. Check name and try again.";
        include('../error/error.php');
    } else {
        add_directory($name);
        header('Location: .?action=list_directories');  // display the directory page list
    }
}

function change_directory() {
	//change the value of a directory
}
// End of functions

$action = initialize();

if ($action == 'list_files') {
	listFiles();
} else if ($action == 'show_upload_form') {
	$directories = get_directory();
	include('upload_form.php');
} else if ($action == 'list_directories') { // Start of the directory functions
    $directories = get_directory();
    include('directory_list.php');
} else if ($action == 'add_directory') {
    addDirectory();
} else if ($action == 'delete_directory') {
    $directory_id = filter_input(INPUT_POST, 'directory_id', 
            FILTER_VALIDATE_INT);
    delete_directory($directory_id);
    header('Location: .?action=list_directories');      // display the directory page list
} else if ($action == 'move_file') {
	
}

?>