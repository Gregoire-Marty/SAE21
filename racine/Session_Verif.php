<?php //This is à fil to securise a web-page on check the logged option, and give $login
	
	session_start();									//Start the session (or continu the previous one)
	if(!isset($_SESSION['logged']) || !$_SESSION['logged']){	//If you try tou bypass the "Administration" page...
		header('Location: Administration.php?error=2');
	}		//first, you are redirected with an error, second cheh !
	$login = isset($_SESSION['login']) ? $_SESSION['login'] : '';	
?>
