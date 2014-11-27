<?php
	require "header.php";
?>
<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
	$(document).ready(function(){
		var name = '';
		$('[name=selectform').change(function(){
			name = $('[name=selectform]:checked').value;
			if(name=='admin')
			{
				$("#subscription").hide();
			}
			$.post('regtodb.php',name,function(data){
                echo data;
                }
            });
		});
		$('[name=catform').change(function(){
			var cat = $('[name=catform]:checked').value;
			$.post('regtodb.php',cat,function(dat){
			echo dat;
			})
		})
	})
</script>

	<style>
		#formstyle
		{
			text-align : center;
			position : relative;
			top : 50px;
		}
	</style>
</head>
<body>
	<div id="formstyle">
		<form method="post" action="regtodb.php">
			Username : <input type="text" name="uname"/><br><br>
			Firstname : <input type="text" name="fname"/><br><br>
			Lastname : <input type="text" name="lname"/><br><br>
			Password : <input type="password" name="pwd"/><br><br>
			Address : <input type="text" name="address"/><br><br>
			Email ID : <input type="text" name="emailid"/><br><br>
			Phone Number : <input type="text" name="phoneno"/><br><br>
			Date Of Birth : <input type="text" name="dob"/><br><br>
			Category : 
			<select name="catform">
				<option value="user">User</option>
				<option value="admin">Admin</option>
			</select><br><br>
			<div id="subscription">
			Subscription Type :
			<select name="selectform" >
				<option value=""></option>
				<option value="gold">Gold</option>
				<option value="silver">Silver</option>
				<option value="platinum">Platinum</option>
			</select></div><br><br>
			<input type="submit" name="submit" value="submit"/>
 		</form>
	</div>
</body>
</html>