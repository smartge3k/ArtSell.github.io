<?php

	require 'connection/config.php';
	require 'functions/users.php';
	
	if (logged_in() === true) {
		$session_user_id = $_SESSION['user_id'];
		$user_data = user_data ($session_user_id,'UserId','username','userphone','useraddress','usermail','userpass','userimg','imgtoken');
	}
?>