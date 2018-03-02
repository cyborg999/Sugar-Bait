<?php

function loggedin()
{
	if((isset($_SESSION["username"])&&isset($_SESSION["password"])) && $_SESSION["in"] == 'in')
	{
		$loggedin = TRUE;
		return $loggedin;
	}
}
// Turn off all error reporting
error_reporting(0);
?>