<?php
	/*
	* member에서의 Ajax 처리
	*/
    header("Content-Type: text/html; charset-UTF-8");
	include_once "../common.php";


	$mode = $_POST['mode'];
	switch($mode) {
            
		// 회원가입 진행중인 것을 나타내는 세션 추가
		case "registProgress" :
			$registProgress = $_POST['registProgress'];
			$msg = '모든 약관에 동의해 주세요.';
			$result = 'fail';
            
            
			if($registProgress == 'yes') {
				$_SESSION['registProgress'] = $registProgress;
				$msg = '모든 약관에 동의하였습니다.';
				$result = 'success';
            }
			$return = json_encode(array('msg' => $msg, 'result' => $result));
			break;
            

		// 회원가입의 인증번호 발급
		case "getKey" :
			$phone = trim($_POST['phone']);
			$msg = '휴대폰 번호를 정확히 입력해주세요.';
			$result = 'fail';
			if($phone != null) {
				$msg = '잘못된 휴대폰 번호 형식입니다.';
				$phoneReg = '/^[0-9]{2,3}-[0-9]{3,4}-[0-9]{4}$/';
				if(preg_match($phoneReg, $phone)) {
					$_SESSION['authKey'] = '123456';	// 인증번호 세션에 저장
					$_SESSION['authPhone'] = $phone;	// 인증에 사용된 휴대폰 번호 세션에 저장
					$msg = '인증번호가 발급되었습니다.';
					$result = 'success';
				}
			}
			$return = json_encode(array('msg' => $msg, 'result' => $result));
			break;

		// 인증키 확인
		case "checkKey" :
			$phone = trim($_POST['phone']);
			$key = trim($_POST['key']);
			$msg = '인증번호가 일치하지 않습니다.';
			$result = 'fail';
		
			if(!$_SESSION['authKey']) {
				$msg = '인증번호 받기를 눌러주세요.';
			}
			if($phone != null) {
				if(isset($_SESSION['registProgress'])) {
					if($phone != $_SESSION['authPhone'])
						$msg = '입력하신 휴대폰 번호와 인증번호를 받은 휴대폰 번호가 일치하지 않습니다.';
					if($phone == $_SESSION['authPhone'] && $key == $_SESSION['authKey']) {
						$msg = '인증되었습니다.';
						$result = 'success';
						unset($_SESSION['authKey']);	// 인증 성공 후 인증번호 세션 삭제
					}
				}
				
				if(!isset($_SESSION['registProgress'])) {
					if($key == $_SESSION['authKey']) {
						$msg = '인증되었습니다.';
						$result = 'success';
						unset($_SESSION['authKey']);	// 인증 성공 후 인증번호 세션 삭제
					}
				}
			}
			$return = json_encode(array('msg' => $msg, 'result' => $result));
			break;
		
		// 아이디중복확인
		case "checkId":
			$uid = trim($_POST['uid']);
			$sql = "SELECT * FROM member WHERE id='$uid'";
			$sqlResult = $conn->query($sql);
			if(!$sqlResult) exit("error : $sql");
			$msg = "<b style='color:red;'>이미 존재하는 아이디입니다. 다른 아이디를 입력해주세요.</b>";
			$result = 'fail';
			if($sqlResult->num_rows == 0) {
				$msg = "<b style='color:blue;'>사용가능한 아이디입니다.</b>";
				$result = 'success';
			}
			$return = json_encode(array('msg' => $msg, 'result' => $result));
			break;
		
		// 로그인
		case "login":
			$uid = $_POST['uid'];
			$pwd = $_POST['pwd'];
			$pwdHash = strtoupper(hash("sha256", $pwd));
			
			$sql = "SELECT * FROM member WHERE uid='$uid' AND pwd='$pwdHash'";
			$sqlResult = $conn->query($sql);
			if(!$sqlResult) exit("error : $sql");
			$msg = '로그인 정보가 일치하지 않습니다.';
			$result = 'fail';
			if($sqlResult->num_rows > 0) {
				$row = $sqlResult->fetch_array(MYSQLI_ASSOC);
				if($row['member_gb'] == "1") {
					$_SESSION['admin'] = $uid;
				}
				$_SESSION['loginId'] = $uid;
				$_SESSION['loginNo'] = $row['no'];
				$msg = '로그인 되었습니다.';
				$result = 'success';
			}
			$return = json_encode(array('msg' => $msg, 'result' => $result));
			break;

	}
	echo $return;
	
	$conn->close();
?>