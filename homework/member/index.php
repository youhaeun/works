<?php
	// member
	include_once "../common.php";
	$mode = $_GET['mode'] ? $_GET['mode'] : "main";
		
	if(isset($_SESSION['loginId']) && $mode != 'main') {
		error("잘못된 접근입니다.", "/member");			
	}
	include_once "../header.php";
	include_once $mode.".php";
	include_once "../footer.php";
	$conn->close();
?>