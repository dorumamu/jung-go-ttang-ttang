<!DOCTYPE html>
<html lang="ko">
<head>
  {{-- Title --}}
  <title>중고땅땅: 회원가입</title>

  {{-- Meta --}}
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  {{-- css --}}
  {{-- <link rel="stylesheet" href ="/css/layout/footer.css" />
  <link rel="stylesheet" href ="/css/layout/header.css" />
  <link rel="stylesheet" href ="/css/layout/side.css" /> --}}
  <link rel="stylesheet" href ="/css/login/sign_up.css"/>

  {{-- Input custom css --}}
  {{-- @yield('css') --}}

  {{-- js --}}
  <!-- J QUERY -->
  <script src="https://code.jquery.com/jquery-3.5.0.js" integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc=" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/7cfb0a1075.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css2?family=Black+Han+Sans&family=Do+Hyeon&display=swap" rel="stylesheet">

  <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
  <script type="text/javascript">

  var RandomNum;

  function mainsends(){
    var random = Math.floor(Math.random() * 10000) + 1;
    var p1 = $('#selectphone').val();
    var p2 = $('#str_phone02').val();
    var p3 = $('#str_phone03').val();
    RandomNum = random;
    var phone = p1+'-'+p2+'-'+p3;
    // alert(phone+"으로 인증번호를 발송했습니다.");
    console.log("인증번호는 :"+ random + " 입니다");
    alert(phone+"Cafe24.com SMS 서비스 이용 갯수가 끝나서 콘솔로 알려드립니다. \n DevTool (F12) -> Console 클릭!");
    // $.ajax({
    //   headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    //   url: "/sms_send",
    //   data: {phone:phone, random:random},
    //   type: "post",
    //   success:function(data){
    //     var datas = data.data;
    //     console.log(datas);
    //     alert(phone+"으로 인증번호를 발송했습니다.");
    //   },
    //   error : function(){
    //     console.log("실패");
    //   }
    // });
  }


  function check(){
    var userid = $('#new_id').val();
    var id_result = $('#id_result').val();

    $.ajax({
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      url: " /idcheck",
      dataType: 'json',
      data: {id:userid},
      type: "POST",
      success:function(data){
        var datas = data.data;
        console.log(datas);
        if(datas==1){
          $("#id_result").text("사용중인 아이디입니다!");

        }
        else {
          $("#id_result").text("사용 가능한 아이디입니다.");

        }
      },
      error : function(){
        console.log(datas);
      }
    });
  }

  var compare_result = false;
  function passwordcheck(){
    var password1 = $('#pwd1').val();
    var password2 = $('#pwd2').val();
    var s_relult2 = $('#s_relult2');
    if (password1 == password2) {
      if (password2 == 0) {
        s_relult2.text("");
      }
      else {
        compare_result = true;
        s_relult2.text('비밀번호가 일치합니다.');
        $("#sub").attr("disabled",false);
      }
    }
    else {
      compare_result = false;
      s_relult2.text('비밀번호가 일치하지 않습니다.');
      $("#sub").attr("disabled",true);
    }
  }

  function chkpw(){
    var pw = $("#pwd1").val();
    var num = pw.search(/[0-9]/g);
    var eng = pw.search(/[A-z]/ig);
    var spe = pw.search(/[`~!@@#$%^&*|₩₩₩'₩";:₩/?]/gi);
    var s_relult1 = $('#s_relult1');

    if(pw.length < 8 || pw.length > 20){
      if(pw.length == 0){
        s_relult1.text("영문, 숫자, 특수문자를 포함한 8자리 이상 입력하세요.");

      }
      else{
        s_relult1.text("8자리 ~ 20자리 이내로 입력해주세요.");
        $("#sub").attr("disabled",true);
      }
    }
    else if(pw.search(/\s/) != -1){
      s_relult1.text("비밀번호는 공백 없이 입력해주세요.");

    }
    else if(num < 0 || eng < 0 || spe < 0 ){
      s_relult1.text("영문,숫자, 특수문자를 혼합하여 입력해주세요.");

    }
    else {
      s_relult1.text("");

    }

  }



  function checkValue(){
    var form = document.userinfo;
    var emil = $("#str_email01").val;
    var pw = $("#pwd1").val();
    var num = pw.search(/[0-9]/g);
    var eng = pw.search(/[A-z]/ig);
    var spe = pw.search(/[`~!@@#$%^&*|₩₩₩'₩";:₩/?]/gi);
    var phoneJ =/^\d{3}\d{3,4}\d{4}$/;
    var nameJ = /^[가-힣/\s/]{2,6}$/;
    var mailJ =  /[`~!@@#$%^&*|₩₩₩'₩";:₩/?/\s/]/;
    var na =  $("#id_result").text();
    var phone02 = $("#str_phone02").val();
    var phone03 = $("#str_phone03").val();
    var pnum02 = phone02.search(/[0-9]{3,4}/g);
    var pnum03 = phone03.search(/[0-9]{4}/g);


    console.log(pnum02);


    if (!form.user_id.value) {
      $('id_b').focus();
      alert("아이디를 입력하세요.");
      return false;
    }
    if (!form.userPwd.value) {
      $('.form-control').focus();
      alert("비밀번호를 입력하세요.");
      return false;
    }
    if (!form.birthday.value) {
      $('#birthday').focus();
      alert("생년월일을 입력하세요.");
      return false;

    }
    if (form.userPwd.value != form.reuserPwd.value) {
      $('#pwd2').focus();
      alert("비밀번호가 일치하지 않습니다.");
      return false;
    }
    if (!nameJ.test($("#new_name").val())) {
      $('#new_name').focus();
      alert("이름을 다시 입력하세요");
      return false;

    }
    // if (!phoneJ.test($("#tel").val())) {
    //   $('#tel').focus();
    //   alert("올바른 전화번호가 아닙니다.");
    //   return false;
    //
    // }
    if (mailJ.test($("#str_email01").val())) {
      $('#str_email01').focus();
      alert("올바른 이메일이 아닙니다.");
      return false;

    }
    if(pw.length < 8 || pw.length > 20){
      $('.form-control').focus();
      alert("비밀번호를 8자리 ~ 20자리 이내로 입력해주세요.");
      return false;
    }
    if(num < 0 || eng < 0 || spe < 0 ){
      $('.form-control').focus();
      alert("영문,숫자, 특수문자를 혼합하여 입력해주세요.");
      return false;
    }
    if(pw.search(/\s/) != -1){
      $('.form-control').focus();
      alert("공백없이 입력해주세요");
      return false;
    }

    if(na == "사용중인 아이디입니다!"){
      $('.id_b').focus();
      alert("사용중인 아이디입니다!.");
      return false;
    }

    if (form.email_ck.value != RandomNum){
      $('#security').focus();
      alert("인증번호가 틀립니다.");
      return false;
    }
    if(pnum02){
      $('#str_phone02').focus();
      alert("휴대폰번호 가운데 숫자를 확인하세요!");
      return false;
    }
    if(pnum03){
      $('#str_phone03').focus();
      alert("휴대폰번호 끝자리 숫자를 확인하세요!");
      return false;
    }
  }


</script>
</head>

<body>
  <div class="sign_up">
    <div class="sign_form">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <form action="{{ url('/singup')}}" method="post" type="submit" name="userinfo" onsubmit="return checkValue()">

        @csrf
        <ul>
          <li>
            <img src="/img/tangtang.png"  alt="로고" class="center-block">
          </li>
          <li>
            <label><strong>아이디</strong><br>
              <input type="text" class="id_b" name="user_id" id="new_id" onblur="check()" minlength=5 maxlength=20 required >
              <p><spen id= "id_result" >아이디 중복확인</spen></p>
            </label>
          </li>

          <li>
            <label><strong>비밀번호</strong><br>
              <input type="password" name="userPwd" id="pwd1" onKeyup="chkpw()" class="form-control" required>

            </label>
            <p><spen id=s_relult1>영문, 숫자, 특수문자를 포함한 8자리 이상 입력하세요.</spen></p>
          </li>
          <li>
            <label><strong>비밀번호 확인</strong><br>
              <input type="password" name="reuserPwd" id="pwd2"  onKeyup="passwordcheck()" class="form-control" required>
            </label>
            <p><spen id= "s_relult2"></spen></p>


          </li>

          <li>
            <label>
              <strong>이름</strong><br>
              <input type="text" name="userName" id="new_name" required>
            </label>
          </li>

          <li>
            <label>
              <strong>생년월일</strong><br>
              <input type="date" id="birthday" name="birthday"
              value="1985-01-01"
              min="1930-01-01" max="2050-12-31" required
              >
            </label>
          </li>

          <li>
            <label><strong>성별</strong><br>
              <select name="gender" id = "gender" required="required">
                <option value="m">남자</option>
                <option value="w">여자</option>
              </select>
            </label>
          </li>
          <li>
            <label><strong>이메일</strong></label><br>
            <div class="emailcontent">
              <input type="text" name="str_email01" id="str_email01" required="required">
              <input type="text" name="str_email02" id="str_email02" placeholder="직접입력">
              <select name="str_email03" id="selectEmail" required="required">
                <option value="1">직접입력</option>
                <option value="naver.com" >naver.com</option>
                <option value="hanmail.net">hanmail.net</option>
                <option value="hotmail.com">hotmail.com</option>
                <option value="nate.com">nate.com</option>
                <option value="yahoo.co.kr">yahoo.co.kr</option>
                <option value="empas.com">empas.com</option>
                <option value="dreamwiz.com">dreamwiz.com</option>
                <option value="freechal.com">freechal.com</option>
                <option value="lycos.co.kr">lycos.co.kr</option>
                <option value="korea.com">korea.com</option>
                <option value="gmail.com">gmail.com</option>
                <option value="hanmir.com">hanmir.com</option>
                <option value="paran.com">paran.com</option>
              </select>
            </div>
          </li>
          <script type="text/javascript">
          //이메일 입력방식 선택
          $('#selectEmail').change(function(){
            $("#selectEmail option:selected").each(function (){
              if($(this).val()== '1'){ //직접입력일 경우
                $("#str_email02").val('');//값 초기화
                $("#str_email02").attr("readonly",false); //활성화
              }
              else{    //직접입력이 아닐경우
                $("#str_email02").attr("readonly",true); //비활성화
                $("#str_email02").val($(this).text()); //선택값 입력

              }
            });
          });
          </script>
          <li>
            <label><strong>전화번호 입력</strong></label><br>
            <div class="str_phonecan">
              <select name="str_phone01" id="selectphone" required="required">
                <option value="010">010</option>
                <option value="011" >011</option>
                <option value="017">017</option>
              </select>
              <input type="number" name="str_phone02" id="str_phone02" required="required">
              <input type="number" name="str_phone03" id="str_phone03" required="required">
            </div>
          </li>
          <li>
            <input type="text" name="email_ck" id="security" size="61" placeholder=" 인증번호 입력하세요" required>
            <button class="sand" onclick="mainsends()" type ="button" id ="bt_secu"><b>인증번호 전송</b></button>
          </li>


          <li>
            <button class="sand"  id="sub" >
              <b>가입하기</b>
            </button>
            <button class="canslbtn" onclick="location.href='/' "  id="subcc" >
              <b>취소</b>
            </button>
          </li>
        </ul>
      </form>
    </div>
    <!--test-->
    <!-- <video id="video" preload="auto" autoplay="true" loop="loop" muted="muted" volume="0">
    <source src="img/Seoul - 21985.mp4">
  </video> -->
  <!--test-->
</div>
</html>


@section('content')
