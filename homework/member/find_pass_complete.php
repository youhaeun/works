<?php
	if(!isset($_SESSION['findPwd']))
		echo "<script>location.href='index.php?mode=find_pass'</script>";
?>
<div id="container" class="container-full">
	<div id="content" class="content">
		<div class="inner">
			<div class="tit-box-h3">
				<h3 class="tit-h3">아이디/비밀번호 찾기</h3>
				<div class="sub-depth">
					<span><i class="icon-home"><span>홈</span></i></span>
					<strong>아이디/비밀번호 찾기</strong>
				</div>
			</div>

			<ul class="tab-list">
				<li><a href="/member/index.php?mode=find_id">아이디 찾기</a></li>
				<li class="on"><a href="/member/index.php?mode=find_pass">비밀번호 찾기</a></li>
			</ul>

			<div class="tit-box-h4">
				<h3 class="tit-h4">비밀번호 재설정</h3>
			</div>

			<div class="section-content mt30">
				<table border="0" cellpadding="0" cellspacing="0" class="tbl-col-join">
					<caption class="hidden">비밀번호 재설정</caption>
					<colgroup>
						<col style="width:17%"/>
						<col style="*"/>
					</colgroup>

					<tbody>
						<tr>
							<th scope="col">신규 비밀번호 입력</th>
							<td><input type="password" name="pwd1" id="pwd1" class="input-text" placeholder="8-15자의 영문자/숫자 혼합" style="width:302px" /></td>
						</tr>
						<tr>
							<th scope="col">신규 비밀번호 재확인</th>
							<td>
								<input type="password" name="pwd2" id="pwd2" class="input-text" style="width:302px" />
								<p id="pwd2_error" style="color:red; font-weight:bold; display:none">비밀번호가 일치하지 않습니다.</p>
							</td>
						</tr>
					</tbody>
				</table>
				<div class="box-btn">
					<a id="checkValue" class="btn-l" style="cursor:pointer">확인</a>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(function(){
		// 비밀번호와 비밀번호 확인 비교 체크
		$("input[name^='pwd']").keyup(function(){
			$("#pwd2_error").css("display", "block");
			if(!$("#pwd1").val() || !$("#pwd2").val())
				$("#pwd2_error").css("display", "none");
			if($("#pwd2").val() == $("#pwd1").val())
				$("#pwd2_error").css("display", "none");
		});
		
		$("#checkValue").click(function(){
			var link = '';
			if(!$("#pwd1").val()) {
				alert("비밀번호를 입력해주세요.");
				$("#pwd1").focus();
				return;
			}
			// 유효성 체크에 사용할 정규식
			var pwdReg = /^[a-z0-9A-Z]{7,14}$/g;
			// 비밀번호 유효성 체크
			if(!pwdReg.test($("#pwd1").val())) {
				alert("비밀번호는 8~15자의 영문자 또는 숫자이어야 합니다.");
				return;
			}
			if(!$("#pwd2").val()) {
				alert("비밀번호 확인을 입력해주세요.");
				$("#pwd2").focus();
				return;
			}
			
			$.post('member_ajax.php', {mode:'changePwd', pwd:$("#pwd1").val()}, function( data ) {
				alert(data.msg);
				link = '#';
				if(data.result == 'success') {
					link = '/member/login.php';
				}
				location.href=link;
			}, "json");
		});
	});
	
</script>