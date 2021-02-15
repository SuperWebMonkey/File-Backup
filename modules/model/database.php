<?php
    $dsn = 'mysql:host=localhost;dbname=file_storage';
    $username = 'msg_user';
	//$dsn = 'mysql:host=localhost;dbname=my_guitar_shop1';
    //$username = 'mgs_user';
    $password = 'pa55word';

    try {
        $db = new PDO($dsn, $username, $password);
		//echo "You have connected to the database";
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        //include('../errors/database_error.php');
		echo $error_message;
        exit();
    }
?>