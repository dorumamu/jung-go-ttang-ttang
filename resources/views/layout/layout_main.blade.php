<!DOCTYPE html>
<html lang="ko">
  <head>
    {{-- Title --}}
    <title>@yield('title')</title>

    {{-- Meta --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- css --}}
    <link rel="stylesheet" href ="/css/footer.css" />
    <link rel="stylesheet" href ="/css/head.css" />
    <link rel="stylesheet" href ="/css/side.css" />

    {{-- Input custom css --}}
    @yield('css')

    {{-- js --}}

    <!-- J QUERY -->
    <script src="https://code.jquery.com/jquery-3.5.0.js" integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc=" crossorigin="anonymous"></script>

    <!-- Bootstarp START -->
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script> --}}
    <!-- Bootstarp END -->

    <script src="https://kit.fontawesome.com/7cfb0a1075.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Black+Han+Sans&family=Do+Hyeon&display=swap" rel="stylesheet">
    <script scr="{{asset('sidemenu.js')}}"></script>

    {{-- custom js --}}
    <script>
      function openNav() {
        document.getElementById('mysidenav').style.width ='100%';
      }
      function closeNav() {
        document.getElementById('mysidenav').style.width ='0';
      }
    </script>

    {{-- Input custom js --}}
    @yield('js')

  </head>

  <body>

    {{-- Layout Header Start --}}
      <nav class="navbar">
        <span class="openmenu" onclick='openNav()'>
          <i class="fas fa-bars"></i>
        </span>

        <div id="mysidenav" class ="sidemenu">
          <a class="closebtn" onclick='closeNav()'> <i class="fas fa-angle-left"></i></a>
          <a href="#">전체 카테고리</a>
          <a href="#">경매 판매하기</a>
          <a href="#">내 정보</a>
          <a href="#">내 관심</a>
          <a href="#">쪽지</a>
        </div>

        <div class="nav_logo">
          <i class="fas fa-gavel"></i>
          <a href="/">중고땅땅</a>
        </div>

        <ul class="nav_menu">
          <li><a href="#">전체 카테고리</a></li>
          <li><a href="#">경매 판매하기</a></li>
          <li><a href="#">내 정보</a></li>
          <li><a href="#">내 관심</a></li>
          <li><a href="#">쪽지</a></li>
        </ul>

        <div class = "nav_login">
          <li><a href="#">Login</a></li>
          <li><a href="http://localhost/CCIT_TEST/public/2">Register</a></li>
        </div>
      </nav>
    {{-- Layout Header End --}}

    {{-- Layout Content Start --}}
      @yield('content')
    {{-- Layout Content End --}}

    {{-- Layout Footer Start --}}
      <footer class="tang-footer">
        <ul>
          <li><a href="https://www.joongbu.ac.kr/home">중부대학교</a></li>
          <li><a href="https://www.naver.com">네이버</a></li>
          <li><a href="#">Examples</a></li>
          <li><a href="#">About</a></li>
        </ul>
          <p class="mb-0">
            Designed by
            <a href="https://www.instagram.com/jin__uu0.jpeg/?hl=ko">Dorumamu</a>
            with the help of
            <a href="https://github.com/JGN97/CCIT_TEST.git">CCIT_A team our Project</a>.
          </p>
          <p class="mb-0">
            중고 땅땅 1.0 ver
          </p>
      </footer>
    {{-- Layout Footer End --}}

  </body>
</html>