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
				<h3 class="tit-h4">비밀번호 찾기 방법 선택</h3>
			</div>
			<dl class="find-box">
				<dt>휴대폰 인증</dt>
				<dd>
					고객님이 회원 가입 시 등록한 휴대폰 번호와 입력하신 휴대폰 번호가 동일해야 합니다.
					<label class="input-sp big">
						<input type="radio" name="radio" id="phone_auth" checked="checked"/>
						<span class="input-txt"></span>
					</label>
				</dd>
			</dl>
			<dl class="find-box">
				<dt>이메일 인증</dt>
				<dd>
					고객님이 회원 가입 시 등록한 이메일 주소와 입력하신 이메일 주소가 동일해야 합니다.
					<label class="input-sp big">
						<input type="radio" name="radio" id="email_auth" name="radio"/>
						<span class="input-txt"></span>
					</label>
				</dd>
			</dl>
			<form id="form1" action="/member/index.php?mode=find_pass_complete" method="post">
				<input type='hidden' name='mode' value='findPwd' />
				<div class="section-content mt30">
					<table border="0" cellpadding="0" cellspacing="0" class="tbl-col-join">
						<caption class="hidden">아이디/비밀번호 찾기 개인정보입력</caption>
						<colgroup>
							<col style="width:15%"/>
							<col style="*"/>
						</colgroup>
						<tbody>
							<tr>
								<th scope="col">성명</th>
								<td><input type="text" name="name" id="name" class="input-text" style="width:302px" /></td>
							</tr>
							<tr>
								<th scope="col">아이디</th>
								<td>
									<input type="text" name="uid" id="uid" class="input-text" style="width:138px"/>
								</td>
							</tr>
							<tr id="auth1">
								<th scope="col">휴대폰 번호</th>
								<td>
									<input type="text" name="phone[]" id="phone1" maxlength="3" class="input-text" style="width:138px"/>&nbsp-&nbsp
									<input type="text" name="phone[]" id="phone2" maxlength="4" class="input-text" style="width:138px"/>&nbsp-&nbsp
									<input type="text" name="phone[]" id="phone3" maxlength="4" class="input-text" style="width:138px"/>
									<a name="getKey" class="btn-s-tin ml10" style="cursor:pointer">인증번호 받기</a>
								</td>
							</tr>
							<tr id="auth2">
								<th scope="col">이메일 주소</th>
								<td>
									<input type="text" name="email[]" id="email1" class="input-text" style="width:138px"/> @
									<input type="text" name="email[]" id="email2" class="input-text" style="width:138px"/>
									<select id="sel_email" class="input-sel" style="width:160px">
										<option value="">선택입력</option>
										<option value="naver.com">naver.com</option>
										<option value="hanmail.net">hanmail.net</option>
										<option value="nate.com">nate.com</option>
                                        <option value="gmail.com">gmail.com</option>
									</select>
									<a name="getKey" class="btn-s-tin ml10" style="cursor:pointer">인증번호 받기</a>
								</td>
							</tr>
							<tr>
								<th scope="col">인증번호</th>
								<td><input type="text" name="key" id="key" class="input-text" style="width:478px" />
								<a id="checkKey" class="btn-s-tin ml10" style="cursor:pointer">인증번호 확인</a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
	// 휴대폰 번호에 숫자만 입력받도록 제한
	$(document).ready(function(){
		$("#auth2").hide();
		$("#phone_auth").click(function() {
			$("#auth1").show();
			$("#auth2").hide();
			$("input[name^='phone']").val('');
		});
		$("#email_auth").click(function() {
			$("#auth1").hide();
			$("#auth2").show();
			$("input[name^='email']").val('');
		});
		// 선택상자 선택에 따른 이메일 변경
		$("#sel_email").change(function(){
			$("#email2").val(this.value);
		});
		// getKey
		$("a[name='getKey']").click(function() {
			var fields = $("#form1").serialize();
			var phoneReg = /^[0-9]{2,3}-[0-9]{3,4}-[0-9]{4}$/g;
			var phone = $("#phone1").val()+"-"+$("#phone2").val()+"-"+$("#phone3").val();
			if(!$("#name").val()) {
				alert("성명을 입력해주세요.");
				$("#name").focus();
				return;
			}
			if(!$("#uid").val()) {
				alert("아이디를 입력해주세요.");
				$("#uid").focus();
				return;
			}
			
			if($("#auth1").css("display") != "none") {
				if(!$("#phone1").val() || !$("#phone2").val() || !$("#phone3").val()) {
					alert("휴대폰 번호를 입력해주세요.");
					$("#phone1").focus();
					return;
				}
			}
			if($("#auth2").css("display") != "none") {
				if(!$("#email1").val() || !$("#email2").val()) {
					alert("이메일 주소를 입력해주세요.");
					$("#email1").focus();
					return;
				}
			}
			if($("#phone1").val() && $("#phone2").val() && $("#phone3").val()) {
				if(!phoneReg.test(phone)) {
					alert("잘못된 전화번호입니다.");
					$("#phone1").focus();
					return;
				}
			}
			$.post('member_ajax.php', fields, function( data ) {
				alert(data.msg);
			}, "json");
		});
		// checkKey
		$("#checkKey").click(function() {
			var phone = $("#phone1").val()+"-"+$("#phone2").val()+"-"+$("#phone3").val();
			var fields = {mode : 'checkKey', phone : phone, key : $("#key").val()};
			if(!$("#key").val()) {
				alert("인증번호를 입력해주세요.");
				$("#key").focus();
				return;
			}
			// checkKey
			$.post('member_ajax.php', fields, function( data ) {
				alert(data.msg);
				if(data.result == "fail") {
					$("#key").focus();
					return;
				}
				form1.submit();
			}, "json");
		});
	});
</script>