<?php
	require "header.php";
?>

<html>
<head>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script>
		$(document).ready(function()
    	{
        	var name='';
        	$('[name=author]').change(function()
        	{
            	userSelectionChanged();
            
        	});
        	$('[name=material]').change(function()
        	{
            	userSelectionChanged();
        	});
        	userSelectionChanged();
    	});
    	function userSelectionChanged()
    	{
        	var params = {};
        	params['author'] = $('[name=author]:checked').value;
        	params['year'] = $('[name=year]:checked').value;

        	$.get('booksdisplay.php',params,function(data){
                	}
            	}
        	);
    	}
    
	</script>
	<style>
		#navigation
		{
			text-align : center;
			position : relative;
			top : 10px;
		}
		#left-navigation
		{
			float : left;
		}
		#right-navigation
		{
			float : right;
		}
	</style>
</head>
<body>
	<div id="right-navigation">
		<a href="index.php">Logout</a>
	</div>
	<div id="navigation">
		
	</div>
	<div id="left-navigation">
		<a href="#">Books Borrowed</a><br><br>
		<a href="#">Books Returned</a><br><br>
		<u>Books</u><br><br>
		<div id="book-selection">
			<form method="get" action="booksdisplay.php">
				<?php
					require_once 'php-activerecord/ActiveRecord.php';
 
		 			ActiveRecord\Config::initialize(function($cfg)
 					{
    					$cfg->set_model_directory('models');
    					$cfg->set_connections(array(
        					'development' => 'mysql://root:@localhost/avinashdb'));
					});

 					$project = BooksInventory::find("all");
 					echo "author:<select name='author'>";
 					echo "<option value=''></option>";
 					foreach($project as $projects)
 					{
 						echo "<option value='",$projects->author_name,"'>",$projects->author_name,"</option>";
 					}
 					echo "</select><br><br>";

 					echo "year of publication:<select name='year'>";
 					echo "<option value=''></option>";
 					foreach($project as $proj)
 					{
 						echo "<option value='",$proj->year_of_publication,"'>",$proj->year_of_publication,"</option>";
 					}
 					echo "</select><br><br>";

 					echo "Book Names:<select name='bookname'>";
 					echo "<option value=''></option>";
 					foreach($project as $proj)
 					{
 						echo "<option value='",$proj->book_name,"'>",$proj->book_name,"</option>";
 					}
 					echo "</select><br><br>";
				?>
				<input type="submit" name="submit" value="submit"/>
			</form>	
		</div> 
	</div>

</body>
</html>