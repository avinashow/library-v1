<?php
	require "header.php";
?>
<html>
<head>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js">
	</script>
	<style>
		#left-navigation
		{
			float : left;
		}
		#navigation
		{
			text-align : center;
			position : relative;
			top : 50px;
		}
		#right-navigation
		{
			float : right;
		}
		#reg
		{
			text-align : center;
			position : relative;
			top : 50px;
		}
	</style>
	<script>
		$(document).ready(function(){
			$("#navigation").hide();
			$("#books").click(function(){
				$("#navigation").show();
				$("#reg").hide();
				$("#book").show();
			});
			$("#disp").click(function(){
				$("#navigation").show();
				$("#book").hide();
				$("#reg").show();
			});
		});
	</script>
</head>
<body>
	<div id="right-navigation">
		<a href="index.php">Logout</a>
	</div>
	<div id="left-navigation">
		<a href="#" id="books">Enter Books</a><br><br>
		<a href="#" id="disp">Users Registered</a>
	</div>
	<div id="navigation">
		<form method="post" action="StoreBook.php" id="book">
			Book Name :           <input type="text" name="bname"/><br><br>
			Author Name :         <input type="text" name="aname"/><br><br>
			Quantity :            <input type="text" name="qty"/><br><br>
			Year of Publication : <input type="text" name="year"/><br><br>
			Publish Company :     <input type="text" name="company"/><br><br>
			<input type="submit" name="submit" value="submit"/>
		</form>
		
		
		<?php
			require_once 'php-activerecord/ActiveRecord.php';
 
 			ActiveRecord\Config::initialize(function($cfg)
 			{
    			$cfg->set_model_directory('models');
    			$cfg->set_connections(array(
        			'development' => 'mysql://root:@localhost/avinashdb'));
			});
 			
			echo "<table border='1' id='reg'>";
			$project = UserLogin::find('all');
			echo "<tr><td>First Name</td><td>Last Name</td><td>Address</td><td>Email ID</td><td>Phone Number</td><td>Action </td>";
			foreach($project as $projects)
			{
				if($projects->category == "user")
				{
					echo "<tr><td>",$projects->firstname,"</td><td>",$projects->lastname,"</td><td>",$projects->address,"</td><td>",$projects->email_id,"</td><td>",$projects->phoneno,"</td><td><input type='submit' name='remove' value='remove' id='del'/></tr>";
				}	
			}
			echo"</table>";
		?>
	</div>
</body>
</html>
