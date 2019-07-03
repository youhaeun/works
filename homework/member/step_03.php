<!-- 회원가입 step_03 start -->

<?php
	// 저장된 registProgress 세션이 yes일 경우에만 진행
	// no이거나 세션이 없을 경우에는 step_01으로 이동
	if($_SESSION['registProgress'] != 'yes' || !isset($_SESSION['registProgress']))
		echo "<script>location.href='index.php?mode=step_01'</script>";
	
	// 인증번호를 받았던 휴대폰 번호를 세션에서 가져옴
	$phone = explode('-', $_SESSION['authPhone']);
?>
<div id="container" class="container-full">
	<div id="content" class="content">
		<div class="inner">
			<div class="tit-box-h3">
				<h3 class="tit-h3">회원가입</h3>
				<div class="sub-depth">
					<span><i class="icon-home"><span>홈</span></i></span>
					<strong>회원가입</strong>
				</div>
			</div>

			<div class="join-step-bar">
				<ul>
					<li><i class="icon-join-agree"></i> 약관동의</li>
					<li><i class="icon-join-chk"></i> 본인확인</li>
					<li class="last on"><i class="icon-join-inp"></i> 정보입력</li>
				</ul>
			</div>

			<form name="form1" id="form1" action="/member/regist.php" method="POST" >
				<div class="section-content">
					<table border="0" cellpadding="0" cellspacing="0" class="tbl-col-join">
						<caption class="hidden">강의정보</caption>
						<colgroup>
							<col style="width:15%"/>
							<col style="*"/>
						</colgroup>

						<tbody>
							<tr>
								<th scope="col"><span class="icons">*</span>이름</th>
								<td><input type="text" name="name" id="name" class="input-text" style="width:302px"/></td>
							</tr>
							<tr>
								<th scope="col"><span class="icons">*</span>아이디</th>
								<td>
									<input type="text" name="uid" id="uid" class="input-text" style="width:302px" placeholder="영문자로 시작하는 4~15자의 영문소문자, 숫자"/>
									<a id="checkId" class="btn-s-tin ml10" style="cursor:pointer">중복확인</a>
									<input type="hidden" name="id_check" id="id_check" value="0" />
									<p name='id_check_msg'></p>
								</td>
							</tr>
							<tr>
								<th scope="col"><span class="icons">*</span>비밀번호</th>
								<td>
									<input type="password" name="pwd1" id="pwd1" class="input-text" style="width:302px" placeholder="8-15자의 영문자/숫자 혼합"/>
								</td>
							</tr>
							<tr>
								<th scope="col"><span class="icons">*</span>비밀번호 확인</th>
								<td>
									<input type="password" name="pwd2" id="pwd2" class="input-text" style="width:302px"/>
									<p id="pwd2_error" style="color:red; font-weight:bold; display:none">비밀번호가 일치하지 않습니다.</p>
								</td>
							</tr>
							<tr>
								<th scope="col"><span class="icons">*</span>이메일주소</th>
								<td>
									<input type="text" name="email[]" id="email1" class="input-text" style="width:138px"/> @ <input type="text" name="email[]" id="email2" class="input-text" style="width:138px"/>
									<select name="sel_email" id="sel_email" class="input-sel" style="width:160px">
										<option value="">선택입력</option>
										<option value="naver.com">naver.com</option>
										<option value="hanmail.net">hanmail.net</option>
										<option value="nate.com">nate.com</option>
                                        <option value="gmail.com">gmail.com</option>
									</select>
								</td>
							</tr>
							<tr>
								<th scope="col"><span class="icons">*</span>휴대폰 번호</th>
								<td>
									<input type="text" name="phone[]" id="phone1" value="<?=$phone[0]; ?>" class="input-text" style="width:50px; background-color:#E6E6E6;" readonly/> - 
									<input type="text" name="phone[]" id="phone2" value="<?=$phone[1]; ?>" class="input-text" style="width:50px; background-color:#E6E6E6;" readonly/> - 
									<input type="text" name="phone[]" id="phone3" value="<?=$phone[2]; ?>" class="input-text" style="width:50px; background-color:#E6E6E6;" readonly/>
								</td>
							</tr>
							<tr>
								<th scope="col"><span class="icons"></span>일반전화 번호</th>
								<td>
									<input type="text" name="tel[]" id="tel1" maxlength="3" class="input-text" style="width:88px"/> -
									<input type="text" name="tel[]" id="tel2" maxlength="4" class="input-text" style="width:88px"/> -
									<input type="text" name="tel[]" id="tel3" maxlength="4" class="input-text" style="width:88px"/>
								</td>
							</tr>
							<tr>
								<th scope="col"><span class="icons">*</span>주소</th>
								<td>
									<p >
										<label>우편번호 <input type="text" name="postcode" id="postcode" class="input-text ml5" style="width:242px; background-color:#E6E6E6;" readonly /></label>
										<a id="daumPostcode" class="btn-s-tin ml10" style="cursor:pointer">주소찾기</a>
									</p>
									<p class="mt10">
										<label>기본주소 <input type="text" name="addr1" id="addr1" class="input-text ml5" style="width:719px"/></label>
									</p>
									<p class="mt10">
										<label>상세주소 <input type="text" name="addr2" id="addr2" class="input-text ml5" style="width:719px"/></label>
									</p>
								</td>
							</tr>
							<tr>
								<th scope="col"><span class="icons">*</span>SMS수신</th>
								<td>
									<div class="box-input">
										<label class="input-sp">
											<input type="radio" name="receive_sms" id="receive_sms1" value="yes" checked='checked' />
											<span class="input-txt">수신함</span>
										</label>
										<label class="input-sp">
											<input type="radio" name="receive_sms" id="receive_sms2" value="no" />
											<span class="input-txt">미수신</span>
										</label>
									</div>
									<p>SMS수신 시, 해커스의 혜택 및 이벤트 정보를 받아보실 수 있습니다.</p>
								</td>
							</tr>
							<tr>
								<th scope="col"><span class="icons">*</span>메일수신</th>
								<td>
									<div class="box-input">
										<label class="input-sp">
											<input type="radio" name="receive_email" id="receive_email1" value="yes" checked='checked' />
											<span class="input-txt">수신함</span>
										</label>
										<label class="input-sp">
											<input type="radio" name="receive_email" id="receive_email2" value="no" />
											<span class="input-txt">미수신</span>
										</label>
									</div>
									<p>메일수신 시, 해커스의 혜택 및 이벤트 정보를 받아보실 수 있습니다.</p>
								</td>
							</tr>
						</tbody>
					</table>

					<div class="box-btn">
						<input style="cursor:pointer" type="submit" value="회원가입" class="btn-l" />
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- 다음 우편번호 API -->
<script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		// 우편번호, 주소 검색
		$("#daumPostcode").click(function() {
			new daum.Postcode({
				oncomplete: function(data) {
					// 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.
					// 각 주소의 노출 규칙에 따라 주소를 조합한다.
					// 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
					var fullAddr = ''; // 최종 주소 변수
					var extraAddr = ''; // 조합형 주소 변수
					// 사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.
					if (data.userSelectedType === 'R') { // 사용자가 도로명 주소를 선택했을 경우
						fullAddr = data.roadAddress;
					} else { // 사용자가 지번 주소를 선택했을 경우(J)
						fullAddr = data.jibunAddress;
					}
					// 사용자가 선택한 주소가 도로명 타입일때 조합한다.
					if(data.userSelectedType === 'R'){
						//법정동명이 있을 경우 추가한다.
						if(data.bname !== ''){
							extraAddr += data.bname;
						}
						// 건물명이 있을 경우 추가한다.
						if(data.buildingName !== ''){
							extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
						}
						// 조합형주소의 유무에 따라 양쪽에 괄호를 추가하여 최종 주소를 만든다.
						fullAddr += (extraAddr !== '' ? ' ('+ extraAddr +')' : '');
					}
					// 우편번호와 주소 정보를 해당 필드에 넣는다.
					$("#postcode").val(data.zonecode); //5자리 새우편번호 사용
					$("#addr1").val(fullAddr);
					// 커서를 상세주소 필드로 이동한다.
					$("#addr2").focus();
				}
			}).open();
		});
		// 선택상자 선택에 따른 이메일 변경
		$("#sel_email").change(function(){
			$("#email2").val(this.value);
		});
		// 입력한 아이디가 변경되면 중복확인되었던 것을 해제
		$("#uid").keyup(function() {
			$("#id_check").val('unchecked');
			$("p[name='id_check_msg']").hide();
		});
		// ajax를 이용한 아이디 중복 확인
		$("#checkId").click(function() {
			var str;
			// id는 영문자로 시작하는 4~15자의 영문소문자, 숫자
			var uidReg = /^[a-z]+[a-z0-9]{3,14}$/g;
			if(!$("#uid").val()) {
				alert("아이디를 입력해주세요.");
				$("#uid").focus();
				return;
			}
			// 아이디 유효성 체크
			if(!uidReg.test($("#uid").val())) {
				alert("아이디는 영소문자로 시작하는 4~15자 영문자 또는 숫자이어야 합니다.");
				return;
			}
			
			
			$.post('member_ajax.php', {mode : 'checkId', uid : $("#uid").val()}, function( data ) {
				$("p[name='id_check_msg']").html(data.msg);
				$("p[name='id_check_msg']").show();
				// 중복된 아이디일 경우 
				if(data.result == "fail") {
					$("#uid").focus();
					return;
				}
				
				$("#pwd1").focus();
				//아이디가 중복되지 않으면 id_check = 'checked' 
				$("#id_check").val('checked');
			}, "json");
		});
		// 비밀번호와 비밀번호 확인 비교 체크
		$("input[name^='pwd']").keyup(function(){
			$("#pwd2_error").css("display", "block");
			if(!$("#pwd1").val() || !$("#pwd2").val())
				$("#pwd2_error").css("display", "none");
			if($("#pwd2").val() == $("#pwd1").val())
				$("#pwd2_error").css("display", "none");
		});
		// 회원가입
		// 폼의 data 확인 후 전송
		$("#form1").submit(function() {
			// 유효성 체크에 사용할 정규식
			var pwdReg = /^[a-z0-9A-Z]{8,15}$/g;
			var phoneReg = /^[0-9]{2,3}-[0-9]{3,4}-[0-9]{4}$/g;
			var telReg = /^[0-9]{2,3}-[0-9]{3,4}-[0-9]{4}$/g;
			var phone = $("#phone1").val()+"-"+$("#phone2").val()+"-"+$("#phone3").val();
			var tel = $("#tel1").val()+"-"+$("#tel2").val()+"-"+$("#tel3").val();
			if(!$("#name").val()) {
				alert("이름을 입력해주세요.");
				$("#name").focus();
				return false;
			}
			if(!$("#uid").val()) {
				alert("아이디를 입력해주세요.");
				$("#uid").focus();
				return false;
			}
			if($("#id_check").val() == "0") {
				alert("아이디 중복확인을 해주세요.");
				return false;
			}
			if(!$("#pwd1").val()) {
				alert("비밀번호를 입력해주세요.");
				$("#pwd1").focus();
				return false;
			}
			// 비밀번호 유효성 체크
			if(!pwdReg.test($("#pwd1").val())) {
				alert("비밀번호는 8~15자의 영문자 또는 숫자이어야 합니다.");
				$("#pwd1").focus();
				return false;
			}
			if(!$("#pwd2").val()) {
				alert("비밀번호 확인을 해주세요.");
				$("#pwd2").focus();
				return false;
			}
			if($("#pwd1").val() != $("#pwd2").val()) {
				alert("비밀번호가 일치하지 않습니다.");
				$("#pwd2").focus();
				return false;
			}
			if(!$("#email1").val() || !$("#email2").val()) {
				alert("이메일을 입력해주세요.");
				$("#email1").focus();
				return false;
			}
			
			if(!phoneReg.test(phone)) {
				alert("잘못된 휴대폰 번호입니다.");
				return false;
			}
			
			// 전화번호를 일부 입력한 경우
			if(!($("#tel1").val() && $("#tel2").val() && $("#tel3").val())) {
				if($("#tel1").val() || $("#tel2").val() || $("#tel3").val()) {
					alert("전화번호를 끝까지 입력해주세요.");
					return false;
				}
			}	
			
			// 전화번호를 전부 입력한 경우
			if($("#tel1").val() && $("#tel2").val() && $("#tel3").val()) {
				if(!telReg.test(tel)) {
					alert("잘못된 전화번호 형식입니다.");
					$("#tel1").focus();
					return false;
				}			
			}			
			if(!$("#postcode").val()) {
				alert("우편번호를 입력해주세요.");
				$("#postcode").focus();
				return false;
			}
			if(!$("#addr1").val()) {
				alert("주소를 입력해주세요.");
				$("#addr1").focus();
				return false;
			}
			if(!$("#addr2").val()) {
				alert("상세주소를 입력해주세요.");
				$("#addr2").focus();
				return false;
			}
			if(!$("input[name^='receive_sms']").is(":checked")) {
				alert("SMS 수신 여부를 선택해주세요.");
				$("#receive_sms1").prop("checked", true);
				return false;
			}
			if(!$("input[name^='receive_email']").is(":checked")) {
				alert("메일 수신 여부를 선택해주세요.");
				$("#receive_email1").prop("checked", true);
				return false;
			}
			return;
		});
	});
</script>
<!-- 회원가입 step_03 end -->