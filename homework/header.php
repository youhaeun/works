<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko">
<!--[if (IE 7)]><html class="no-js ie7" xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko"><![endif]-->
<!--[if (IE 8)]><html class="no-js ie8" xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko"><![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" id="X-UA-Compatible" content="IE=EmulateIE8" />
<title>해커스 HRD</title>
<meta name="description" content="해커스 HRD" />
<meta name="keywords" content="해커스, HRD" />

<!-- 파비콘설정 -->
<link rel="shortcut icon" type="image/x-icon" href="http://img.hackershrd.com/common/favicon.ico" />

<!-- xhtml property속성 벨리데이션 오류/확인필요 -->
<meta property="og:title" content="해커스 HRD" />
<meta property="og:type" content="website" />
<meta property="og:url" content="http://www.hackershrd.com/" />
<meta property="og:image" content="http://img.hackershrd.com/common/og_logo.png" />

<link type="text/css" rel="stylesheet" href="http://q.hackershrd.com/worksheet/css/common.css" />
<link type="text/css" rel="stylesheet" href="http://q.hackershrd.com/worksheet/css/bxslider.css" />

<!-- main페이지에만 호출 -->
<link type='text/css' rel='stylesheet' href='http://q.hackershrd.com/worksheet/css/main.css' />

<!-- sub페이지에만 호출 -->
<link type='text/css' rel='stylesheet' href='http://q.hackershrd.com/worksheet/css/sub.css' />

<!-- login페이지에만 호출 -->
<?php
	if($basename == "login.php") {
		echo "<link type='text/css' rel='stylesheet' href='http://q.hackershrd.com/worksheet/css/login.css' />";
	}
?>

<script type="text/javascript" src="http://q.hackershrd.com/worksheet/js/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="http://q.hackershrd.com/worksheet/js/plugins/bxslider/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="http://q.hackershrd.com/worksheet/js/plugins/bxslider/bxslider.js"></script>
<script type="text/javascript" src="http://q.hackershrd.com/worksheet/js/ui.js"></script>
<!--[if lte IE 9]> <script src="/js/common/place_holder.js"></script> <![endif]-->

</head>
<body>
<?php if($basename != "login.php") { ?>
<!-- skip nav -->
<div id="skip-nav">
<a href="#content">본문 바로가기</a>
</div>
<!-- //skip nav -->

<div id="wrap">
	<div id="header" class="header">
		
		<div class="nav-section">
			<div class="inner p-r">
				<h1><a href="/member"><img src="http://img.hackershrd.com/common/logo.png" alt="해커스 HRD LOGO" width="165" height="37"/></a></h1>
				<div class="nav-box">
					<h2 class="hidden">주메뉴 시작</h2>
					
					<ul class="nav-main-lst">
						<li class="mnu">
							<a href="#">일반직무</a>
							<ul class="nav-sub-lst">
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
							</ul>
						</li>
						<li class="mnu2">
							<a href="#">산업직무</a>
							<ul class="nav-sub-lst">
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
							</ul>
						</li>
						<li class="mnu3">
							<a href="#">공통역량</a>
							<ul class="nav-sub-lst">
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
							</ul>
						</li>
						<li class="mnu4">
							<a href="#">어학 및 자격증</a>
							<ul class="nav-sub-lst">
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
							</ul>
						</li>
						<li class="mnu5">
							<a href="#">직무교육 안내</a>
							<ul class="nav-sub-lst">
								<li><a href="#">해커스 HRD 소개</a></li>
								<li><a href="#">사업주훈련</a></li>
								<li><a href="#">근로자카드</a></li>
								<li><a href="#">학습안내</a></li>
								<li><a href="/lecture_board/index.php?mode=list">수강후기</a></li>
							</ul>
						</li>
						<li class="mnu6">
							<a href="#">내 강의실</a>
							<ul class="nav-sub-lst">
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>

			<div class="nav-sub-box">
				<div class="inner"><!-- <a href="#"><img src="/" alt="배너이미지" width="171" height="196"></a> --></div>
			</div>

		</div>
		<div class="top-section">
			<div class="inner">
				<div class="link-box">
				<?php if(!isset($_SESSION['loginId'])) { ?>
					<!-- 로그인전 -->
					<a href="/member/login.php">로그인</a>
					<a href="/member/index.php?mode=step_01">회원가입</a>
					<a href="#">상담/고객센터</a>
				<?php } else { ?>
					<!-- 로그인후 -->
					
					<?php
						echo $_SESSION['loginId']."님";
						if(isset($_SESSION['admin']))
							echo "<a href='/admin'>관리자메뉴</a>";
					?>
					<a href="/member/login.php?mode=logout">로그아웃</a>
					<a href="/member/index.php?mode=modify">내정보</a>
					<a href="#">상담/고객센터</a>
				<?php } ?>
				</div>
			</div>
		</div>
	</div>
<?php } ?>