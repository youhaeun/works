<?php
	include_once "../common.php";

	$mode = $_GET['mode'];	
	
	switch($mode) {
		// 회원 등록, 수정
		case "write":
			if($_SERVER['REQUEST_METHOD'] == 'POST') {
				$loginId = $_SESSION['loginId'];
				$pwd = $_POST['pwd1'];
				$email = $_POST['email'];
				$tel = $_POST['tel'];
				$postcode = $_POST['postcode'];
				$addr = $_POST['addr1'];
				$addrDetail = $_POST['addr2'];
				$receiveSMS = $_POST['receive_sms'] ? $_POST['receive_sms'] : 'yes';
				$receiveEmail = $_POST['receive_email'] ? $_POST['receive_email'] : 'yes';
				
				$email = implode('@', $email);
				$tel = implode('-', $tel);
				
				if(!$pwd) {
					error("비밀번호를 입력해주세요.", $_SERVER['HTTP_REFERER']);
					exit();
				}
				if(!$postcode) {
					error("우편번호를 입력해주세요.", $_SERVER['HTTP_REFERER']);
					exit();
				}
				if(!$addr) {
					error("주소를 입력해주세요.", $_SERVER['HTTP_REFERER']);
					exit();
				}
				if(!$addrDetail) {
					error("상세주소를 입력해주세요.", $_SERVER['HTTP_REFERER']);
					exit();
				}
				// 유효성 체크에 사용할 정규식
				$pwdReg = "/^[a-z0-9A-Z]{8,15}$/";		// 영문자와 숫자의 조합, 8~15글자
				$emailReg = "/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/";
				
				$telReg = "/^[0-9]{2,3}-[0-9]{3,4}-[0-9]{4}$/";
				// 0~9의 숫자로 시작, 2~3자 - 0~9의 숫자, 3~4자 - 0~9의 숫자, 4자로 끝
				
				// 유효성 체크
				if(!preg_match($pwdReg, $pwd)) {
					error("잘못된 비밀번호 형식입니다.", $_SERVER['HTTP_REFERER']);
					exit();
				}
				if(!preg_match($emailReg, $email)) {
					error("잘못된 이메일 형식입니다.", $_SERVER['HTTP_REFERER']);
					exit();
				}
								
				if(str_replace('-', '', $tel) != '') {
					if(!preg_match($telReg, $tel)) {
						error("잘못된 전화번호 형식입니다.", $_SERVER['HTTP_REFERER']);
						exit();
					}
				}
				// 비밀번호는 sha256 암호화처리
				$pwdHash = strtoupper(hash("sha256", $pwd));
				// query문
				$sql = "update member set pwd='$pwdHash', email='$email', tel='$tel', postcode='$postcode', addr='$addr', addrDetail='$addrDetail', receiveSMS='$receiveSMS', receiveEmail='$receiveEmail' where id='$loginId'";
				$link = '/member';
				if(!isset($_SESSION['loginId'])) {
					$name = $_POST['name'];
					$uid = $_POST['uid'];
					$phone = $_SESSION['authPhone'];
					if(!$name) {
						error("이름을 입력해주세요.", $_SERVER['HTTP_REFERER']);
						exit();
					}
					if(!$uid) {
						error("아이디를 입력해주세요.", $_SERVER['HTTP_REFERER']);
						exit();
					}
					
					// 유효성 체크에 사용할 정규식
					$uidReg = "/^[a-z]+[a-z0-9]{3,14}$/";	// 영문소문자로 시작, 영문소문자와 숫자의 조합, 4~15글자
					$phoneReg = "/^[0-9]{2,3}-[0-9]{3,4}-[0-9]{4}$/";
					
					// 유효성 체크
					if(!preg_match($uidReg, $uid)) {
						error("잘못된 아이디 형식입니다.", $_SERVER['HTTP_REFERER']);
						exit();
					}
					
					if(!preg_match($phoneReg, $phone)) {
						error("잘못된 휴대폰 번호 형식입니다.", $_SERVER['HTTP_REFERER']);
						exit();
					}
					$sql = "insert into member (name, id, pwd, email, phone, tel, postcode, addr, addrDetail, receiveSMS, receiveEmail) value ('$name', '$uid', '$pwdHash', '$email', '$phone', '$tel', '$postcode', '$addr', '$addrDetail', '$receiveSMS', '$receiveEmail');";
					
					unset($_SESSION['authPhone']);	// 회원가입에 사용했던 인증 휴대폰 번호 세션 삭제
					unset($_SESSION['registProgress']);	// 회원가입 진행 중임을 알리던 세션 삭제
					$link = '/member/index.php?mode=complete';
				}
				$result = mysqli_query($conn, $sql);
				if(!$result) exit("error : $sql");
				
			}
			echo "<script>location.href='".$link."';</script>";
			break;
            
		// 회원 정보 조회
		case "modify":
			$loginId = $_SESSION['loginId'];	
			$sql = "SELECT * FROM member WHERE id='$loginId'";
			$result = mysqli_query($conn, $sql);
			if(!$result) exit("error : $sql");
			
			$row = mysqli_fetch_array($result);
			$name = $row['name'];
			$uid = $row['id'];
			$email = $row['email'];
			$phone = $row['phone'];
			$tel = $row['tel'];
			$postcode = $row['postcode'];
			$addr = $row['addr'];
			$addrDetail = $row['addrDetail'];
			$receiveSMS = $row['receiveSMS'];
			$receiveEmail = $row['receiveEmail'];
			$email = explode('@', $email);
			$tel = explode('-', $tel);	
			break;
            
		// 아이디 찾기
		case "find_id_complete":
            unset($_SESSION['authKey']);
			if($_SERVER['REQUEST_METHOD'] == 'POST') {
				$name = trim($_POST['name']);
				$phone = $_POST['phone'];
				$email = $_POST['email'];
                $uid = $_POST['uid'];
				
				$phone = implode('-', $phone);
				$email = implode('@', $email);
//				$where = " WHERE name='$name' AND phone='$phone'";
//				if(str_replace('-', '', $phone) == null)
//					$where = " WHERE name='$name' AND email='$email'";
				
				$sql = "SELECT id FROM member WHERE name='$name'";
                
				$result = mysqli_query($conn, $sql);
				$row = mysqli_fetch_array($result);

			}
			break;
	}
?>