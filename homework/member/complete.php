<?
include_once "../header.php";
?>
<div id="container" class="container-full">
	<div id="content" class="content">
		<div class="inner">
			<div class="tit-box-h3">
				<h3 class="tit-h3">회원가입 완료</h3>
				<div class="sub-depth">
					<span><i class="icon-home"><span>홈</span></i></span>
					<strong>회원가입 완료</strong>
				</div>
			</div>

			<div class="guide-box">
				<i class="graphic-join"></i>
				<p class="big-title">해커스HRD 회원이 되신것을 환영합니다!</p>
				<p class="mt10">해커스에서 제공하는 다양한 컨텐츠를 누리세요!<br/>해커스는 언제나 여러분의 목표달성을 응원합니다.</p>
			</div>

			<div class="box-btn mt30">
			<?php
				if(!isset($_SESSION['loginid']))
					echo "<a href='/member/login.php' class='btn-l'>로그인</a>";
			?>
				<a href="#" class="btn-l-line ml5">수강신청</a>
			</div>

		</div>
	</div>
</div>