<?php
//	// logout
//	if(session_destroy()) {
//        //header('Location : /member/index.php');
//		echo "<script>location.replace('/member');</script>";
//	}

session_start();
session_destroy();
?>
<meta http-equiv="refresh" content="0;url=index.php" />