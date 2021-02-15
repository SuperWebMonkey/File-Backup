<?php
	require('../model/database.php');
	require('../model/file_db.php');
	require('../model/directory_db.php');
	require('../model/upload_db.php');
	
	/*
		Uploads file to the database
	*/
	function upload_file($directory_id) {
		$name = $_FILES['myfile']['name'];
		$file_ext = pathinfo($name, PATHINFO_EXTENSION);
		$valid = array(
						"jpeg", "jpg", "png", "java", "js",
						"html", "doc", "docx", "xlsx", "py",
						"php", "css"
					  );
		$isValid = in_array($file_ext, $valid);
		$path = 'my_uploads/' . $name;
		
		if(file_exists($path) === true && $name != '') {
			header("location:index.php?st=exist");
		}
		else if(($name != '' || $name != null) && $isValid) {
			$type = $_FILES['myfile']['type'];
			$data = file_get_contents($_FILES['myfile']['tmp_name']);
			
			$path = 'my_uploads/';
			move_uploaded_file($_FILES['myfile']['tmp_name'], ($path . $name));
			add_upload($name, $type, $data, $directory_id);
			
			header("Location:index.php?st=success");
		} else {
			header("Location:index.php?st=error");
		}
	}
	// If the submit button is selected
	if(isset($_POST['submit'])){
		$directory_id = filter_input(INPUT_GET, 'directory_id', 
            FILTER_VALIDATE_INT);

		if ($directory_id == NULL || $directory_id == FALSE) {
			$directory_id = 1;
		}

		$directory_name = get_directory_name($directory_id);
		$directories = get_directory();
		upload_file($directory_id);
	} 
	// If the delete button is selected
	if(isset($_GET['delete'])) {
		$filed_id = $_GET['delete'];

		$name = get_name($filed_id);
		delete_upload($filed_id);

		header("Location:index.php?st=delete&name=$name");
	}
?>