<?php	
	require "header.php";
	require_once 'php-activerecord/ActiveRecord.php';
 
	ActiveRecord\Config::initialize(function($cfg)
 	{
    	$cfg->set_model_directory('models');
    	$cfg->set_connections(array(
    		'development' => 'mysql://root:@localhost/avinashdb'));
	});

	$conditions_array = [];
	if (!empty($_GET['author']))
	{
    	$conditions_array['author_name'] = $_GET['author'];
	}

	if(!empty($_GET['year']))
	{
		$conditions_array['year_of_publication'] = $_GET['year'];
	}

	if(!empty($_GET['bookname']))
	{
		$conditions_array['book_name'] = $_GET['bookname'];
	}

	echo "<html><head><style>#navigation{ text-align : center;}</style></head><body><div id='navigation'>";
	if(!empty($conditions_array))
	{
		$booksinventory = BooksInventory::find('all',$conditions_array);  
	}
	else
	{
		$booksinventory = BooksInventory::find('all');  
	}
	echo "<table border='1'><tr><td>Author name</td><td>Book Name</td><td>Year of Publication</td><td>Action</td></tr>";
	foreach($booksinventory as $book)
	{
		echo "<tr><td>",$book->author_name,"</td><td>",$book->book_name,"</td><td>",$book->year_of_publication,"</td><td><input type='submit' name='submit' value='borrow'/></tr>";
	}
	echo"</table></div><div><a href='Home.php'>Back</a></div></body></html>";
?>