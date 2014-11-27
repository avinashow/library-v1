<?php
	require_once 'php-activerecord/ActiveRecord.php';
 
 ActiveRecord\Config::initialize(function($cfg)
 {
    $cfg->set_model_directory('models');
    $cfg->set_connections(array(
        'development' => 'mysql://root:@localhost/avinashdb'));
});

$project = UserLogin::find_by_username_and_category($_GET['uname'],$_GET['catform']);

if(empty($project))
{
	echo "Please Try again";
	header("location:index.php");
}
else
{
	if($_GET['uname']==$project->username)
	{
		if($project->category=="admin")
		{
			header("location:AdminHome.php");
		}
		else
		{
			header("location:Home.php");
		}
	}
	else
	{
		header("location:index.php");
	}
}
	
?>