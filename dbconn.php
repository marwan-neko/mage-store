<?php
	/* php & mysql db connection file*/
	$username = "root"; //mysql username
	$password = ""; //mysql password
	$hostname = "localhost"; //server name or ip address
	$dbname = "gamestore"; //your dbname

	$dbconn = mysqli_connect($hostname, $username, $password, $dbname);

	if (mysqli_connect_errno())
	{
		echo "failed to connect to MySQL: " . mysqli_connect_error();
	}	
?> 