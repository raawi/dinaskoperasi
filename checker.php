<?php session_start();
include 'library/koneksi.php'; // include the library for database connection
koneksi_buka();
if(isset($_POST['action']) && $_POST['action'] == 'login'){ // Check the action `login`
	$username 		= htmlentities($_POST['username']); // Get the username
	$password 		= htmlentities(md5($_POST['password'])); // Get the password and decrypt it
	$query			= mysql_query('SELECT * FROM penilai WHERE username = "'.$username.'" AND password = "'.$password.'" '); // Check the table with posted credentials
	$num_rows		= mysql_num_rows($query); // Get the number of rows
	if($num_rows <= 0){ // If no users exist with posted credentials print 0 like below.
		echo 0;
	} else {
		$fetch = mysql_fetch_array($query);
		// NOTE : We have already started the session in the library.php
		$_SESSION['userid'] 		= $fetch['nip'];
		$_SESSION['username'] 	= $fetch['username'];
		$_SESSION['password'] 	= $fetch['password'];
		$_SESSION['nama_penilai'] 	= $fetch['nama_penilai'];
		$_SESSION['photo'] 	= $fetch['photo'];
		echo 1;
	}
}
koneksi_tutup();
?>