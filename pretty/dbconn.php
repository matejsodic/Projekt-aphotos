<?php
 
 
	# Stop Hacking attempt
	if(!defined('__APP__')) {
		die("Hacking attempt");
	}
	include "config.php";
	
	# Connect to MySQL database
	$MySQL = mysqli_connect($conf['MySQL']['Host'],$conf['MySQL']['User'],$conf['MySQL']['Password'],$conf['MySQL']['Database'])
	or die('Error connecting to MySQL server.');

	