<?php
	// logout
	if(session_destroy()) {
        //header('Location : /member/index.php');
		echo "<script>location.replace('/member');</script>";
	}
?>