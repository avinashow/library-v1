<?php
	require_once 'php-activerecord/ActiveRecord.php';
 
 	ActiveRecord\Config::initialize(function($cfg)
 	{
    	$cfg->set_model_directory('models');
    	$cfg->set_connections(array(
        	'development' => 'mysql://root:@localhost/avinashdb'));
	});

 	$project = new BooksInventory();


	$project->book_name = $_POST['bname'];
	$project->author_name = $_POST['aname'];
	$project->no_of_books = $_POST['qty'];
	$project->year_of_publication = $_POST['year'];
	$project->pulbish_company = $_POST['company'];

	$project->save();
	echo "inserted succesfully";
	header("location:AdminHome.php");
	
?>