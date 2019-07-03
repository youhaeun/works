<?php
	// login 관리
	// 현재 실행되고 있는 페이지명만 구합니다.
	// 구한 페이지명으로 header와 footer에서 로그인 페이지에서
	// 보이지 않아도 될 부분을 제외한다
	$basename = basename($_SERVER["PHP_SELF"]);

	include_once "../common.php";

	$mode = $_GET['mode'] ? $_GET['mode'] : "login_form";
	if(isset($_SESSION['loginId']) && $mode != 'logout') {
		error("잘못된 접근입니다.", "/member");			
	}
	include_once "..//header.php";
	include_once $mode.".php";

	$conn->close();
?>