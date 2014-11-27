<?php

	require "header.php";
?>
<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<style>
	#formstyle
	{
		text-align : center;
		position : relative;
		top : 10px;
	}
</style>
<script>
	$(document).ready(function(){
		$('[name=catform').change(function(){
			var cat = $('[name=catform]:checked').value;
			$.get('decide.php',cat,function(dat){
				echo dat;
			})
		})
	})
</script>
</head>
<body>
	<div id="formstyle">
		<form method="get" action="decide.php">
			Username : <input type="text" name="uname"/><br><br>
			Password : <input type="text" name="password"/><br><br>
			Select :
			<select name="catform">
				<option value="admin">Admin</option>
				<option value="user">User</option>
			</select>
			<a href="Registration.php">Register?</a><br><br>			
			<input type="submit" name="submit" value="submit"/>
		</form>
	</div>
</body>
</html>