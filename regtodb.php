<?php

 require_once 'php-activerecord/ActiveRecord.php';
 
 ActiveRecord\Config::initialize(function($cfg)
 {
    $cfg->set_model_directory('models');
    $cfg->set_connections(array(
        'development' => 'mysql://root:@localhost/avinashdb'));
});

 	$project = new UserLogin();

	$project->username = $_POST['uname'];
	$project->firstname = $_POST['fname'];
	$project->lastname = $_POST['lname'];
	$project->password = $_POST['pwd'];
	$project->address = $_POST['address'];
	$project->email_id = $_POST['emailid'];
	$project->phoneno = $_POST['phoneno'];
	$project->date_of_birth = $_POST['dob'];
	$project->account_type = $_POST['selectform'];
	$project->category = $_POST['catform'];

	$project->save();

	echo "Inserted succesfully";

	header("location:index.php");
?>