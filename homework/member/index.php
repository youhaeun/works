<?php
	// member
	include_once "../common.php";

	$mode = $_GET['mode'] ? $_GET['mode'] : "main";

	include_once "../header.php";
	include_once $mode.".php";
	include_once "../footer.php";

	$conn->close();
?>