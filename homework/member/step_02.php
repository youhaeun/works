<!-- 회원가입 step_02 start -->

<?php
	// 저장된 registProgress 세션이 yes일 경우에만 진행
	// no이거나 세션이 없을 경우에는 step_01으로 이동
	if($_SESSION['registProgress'] != 'yes' || !isset($_SESSION['registProgress']))
		echo "<script>location.href='index.php?mode=step_01'</script>";
?>
<div id="container" class="container-full">
	<div id="content" class="content">
		<div class="inner">
			<div class="tit-box-h3">
				<h3 class="tit-h3">회원가입</h3>
				<div class="sub-depth">
					<span><i class="icon-home"><span>홈</span></i></span>
					<strong>회원가입 완료</strong>
				</div>
			</div>

			<div class="join-step-bar">
				<ul>
					<li><i class="icon-join-agree"></i> 약관동의</li>
					<li class="on"><i class="icon-join-chk"></i> 본인확인</li>
					<li class="last"><i class="icon-join-inp"></i> 정보입력</li>
				</ul>
			</div>

			<div class="tit-box-h4">
				<h3 class="tit-h4">본인인증</h3>
			</div>

			<div class="section-content after">
				<div class="identify-box" style="width:100%;height:190px;">
					<div class="identify-inner">
						<strong>휴대폰 인증</strong>
						<p>주민번호 없이 메시지 수신가능한 휴대폰으로 1개 아이디만 회원가입이 가능합니다. </p>
							<br />
							<input type="text" name="phone[]" id="phone1" maxlength="3" value="010" class="input-text" style="width:50px"/> - 
							<input type="text" name="phone[]" id="phone2" maxlength="4" class="input-text" style="width:50px"/> - 
							<input type="text" name="phone[]" id="phone3" maxlength="4" class="input-text" style="width:50px"/>
							<a id="getKey" class="btn-s-line" style="cursor:pointer">인증번호 받기</a>
							<br /><br />
							<input type="text" name="key" id="key" class="input-text" style="width:200px"/>
							<a id="checkKey" class="btn-s-line" style="cursor:pointer">인증번호 확인</a>
						
					</div>
					<i class="graphic-phon"><span>휴대폰 인증</span></i>
				</div>
			</div>

		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){		
		$("#getKey").click(function() {
			var phoneReg = /^[0-9]{2,3}-[0-9]{3,4}-[0-9]{4}$/g;
			var phone = $("#phone1").val()+"-"+$("#phone2").val()+"-"+$("#phone3").val();
			if(!$("#phone1").val() || !$("#phone2").val() || !$("#phone3").val()) {
				alert("휴대폰 번호를 입력해주세요.");
				$("#phone1").focus();
				return;
			}
			if(!phoneReg.test(phone)) {
				alert("잘못된 전화번호입니다.");
				return;
			}
			
			$.post("member_ajax.php", {mode:'getKey', phone: phone}, function( data ) {
				alert(data.msg);
				if(data.result == "fail") {
					$("#phone1").focus();
					return;
				}
				$("#key").focus();
			}, "json");
		});
		$("#checkKey").click(function() {
			var phone = $("#phone1").val()+"-"+$("#phone2").val()+"-"+$("#phone3").val();
			if(!$("#key").val()) {
				alert("인증번호를 입력해주세요.");
				$("#key").focus();
				return;
			}
			
			$.post("member_ajax.php", {mode : 'checkKey', phone : phone, key : $("#key").val()}, function( data ) {
				alert(data.msg);
				if(data.result == "fail") {
					$("#key").focus();
					return;
				}
				window.location.href="/member/index.php?mode=step_03";
			}, "json");
		});
	});	
</script>
<!-- 회원가입 step_02 end -->