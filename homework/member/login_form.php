<div class="login-section">
	<div class="bg"></div>
	<div class="login-inner">
		<h1><a href="/"><img src="http://img.hackershrd.com/common/logo.png" alt="해커스 HRD LOGO" width="142" height="31"/></a></h1>
		<div class="box-login">

			<form id="form1" method='post'>
				<div class="login-input">
					<div class="input-text-box">
						<input type="hidden" name="mode" value="login" />
						<input type="text" name="uid" id="uid" class="input-text mb5" placeholder="아이디" style="width:190px"/>
						<input type="password" name="pwd" id="pwd" class="input-text" placeholder="비밀번호" style="width:190px"/>
						<input type="hidden" name="referer" value="<?php echo $_SERVER['HTTP_REFERER']; ?>" />
					</div>
					<button type="submit" class="btn-login">로그인</button>
				</div>
			</form>
			
			<div class="login-chk">
				<label class="input-sp">
					<input type="checkbox"/>
					<span class="input-txt">아이디 저장</span>
				</label>
				<label class="input-privacy on">보안접속 ON <input type="checkbox" title="IP 보안이 켜져 있습니다. IP보안을 사용하지 않으시려면 선택을 해제해주세요." /></label>
				<!-- <label class="input-privacy">보안접속 OFF <input type="checkbox" title="보안이 꺼져 있습니다. 보안을 사용하려면 선택해주세요." /></label> -->
			</div>
			
			<div class="box-btn">
				<a href="/member/index.php?mode=step_01" class="btn-m-gray">회원가입</a>
				<a href="/member/index.php?mode=find_id" class="btn-m-gray">ID/PW 찾기</a>
			</div>
		</div>
		<div class="login-guide">
			<strong><i class="icon-guide"></i>로그인에 문제가 있으신가요?</strong>
			<ol>
				<li>① 인터넷 창 상단 [도구] - [인터넷 옵션] - [보안] - [사용자 지정 수준] - [보통] 으로 설정해주세요.</li>
				<li>② 인터넷 창을 껐다 다시 켜주세요. 그래도 로그인에 문제가 있으시다면 <a href="#"><strong class="tc-brand">[고객센터]</strong></a>를 통해 문의해주세요.</li>
			</ol>
		</div>
		
		<div class="link-box">
			<a href="#">환급과정안내</a>
			<a href="#">기업교육문의</a>
			<a href="#">상담/고객센터</a>
		</div>

		<div class="login-banner">
			<div class="bxslider-default" data-mode="fade" data-auto="true" data-controls="true" data-pager="true" style="height:182px">
				<ul class="bxslider">
					<li><img src="http://www.champstudy.com/files/banner/imglib_files/banner/imglib/300freepass_620x400.jpg" alt="" width="262" height="182"/></li>
					<li><img src="http://www.champstudy.com/files/banner/imglib_files/banner/imglib/champstudy_first_toeic_class_620x400.jpg" alt="" width="262" height="182"/></li>
					<li><img src="http://www.champstudy.com/files/banner/imglib_files/banner/imglib/teps0freepass_620x400.jpg" alt="" width="262" height="182"/></li>
					<li><img src="http://www.champstudy.com/files/banner/imglib_files/banner/imglib/2nd_foreign_620x400.jpg" alt="" width="262" height="182"/></li>
				</ul>
			</div>
		</div>
	</div>
	<span class="login-close"><button type="button" onClick="location.href='<?php echo $_SERVER['HTTP_REFERER']; ?>'" class="icon-layer-close"><span class="hidden">닫기</span></button></span>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$("#form1").submit(function() {
			var fields = $("#form1").serialize();
			var link = '#';
			if(!$("#uid").val()) {
				alert("아이디를 입력해주세요.");
				$("#uid").focus();
				return false;
			}
			if(!$("#pwd").val()) {
				alert("비밀번호를 입력해주세요.");
				$("#pwd").focus();
				return false;
			}
			$.post('member_ajax.php', fields, function( data ) {
				alert(data.msg);
				if(data.result == 'success') {
					link = $("input[name='referer']").val();
				}
				
				location.href=link;
			}, "json");
		});		
	});
</script>