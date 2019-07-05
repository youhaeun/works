<?php
header("Content-Type: text/html; charset=UTF-8");
include_once "../common.php";

//1. 필수항목에 대한 유효성 검사를 한다
//2. 
$email = join('@', $_POST['email']);
$phone = join('-', $_POST['phone']);
$tel = join('-', $_POST['tel']);
$pwd = $_POST['pwd1'];
$regdate = date('Y-m-d H:i:s');

echo "<pre>";
print_r($_POST);
echo "</pre>";
//exit;
$query = "INSERT INTO member SET
				id= '".$_POST['uid']."',
				pwd= sha2('".$pwd."', 256),
				name= '".$_POST['name']."',
				email= '".$email."',
                phone= '".$phone."',
                tel= '".$tel."',
				addr= '".$_POST['addr1']."',
                addrDetail= '".$_POST['addr2']."',
                receiveSMS= '".$_POST['receive_sms']."',
                regdate= '".$regdate."',
                postcode= '".$_POST['postcode']."',
                receiveEmail='".$_POST['receive_email']."'";
//echo $query;
$conn->query($query);
print_r($_POST);

if($query)
{
    echo "<script>alert('회원가입이 완료되었습니다.')</script>";
}

echo ("<meta http-equiv='Refresh' content='0; URL=index.php?mode=complete'>");
?>