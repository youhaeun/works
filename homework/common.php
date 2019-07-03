<?
// Session Start
	session_start();

	// db 연결
	error_reporting(E_ALL & ~E_NOTICE);
	ini_set("display_errors", 1);

	$server = "192.168.56.101";
	$username = "root";
	$password = "localhost";
	$database = "member_test";
	//$conn = mysqli_connect($server, $username, $password, $database);

	$conn = new mysqli($server, $username, $password, $database);

	$conn->set_charset("utf8");
    //$conn->query("set name utf8");

	if ($conn->connect_errno)
		exit("Failed to connect to MySQL: " . $conn->connect_error);
	print_r($conn->get_connection_stats);

?>