<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  {{-- 기본 경로 지정  ex) localhost/template/vendor/fontawesome-free/css/all.min.css--}}
  <base href="/template/"/>

  <title>중고땅땅-관리자페이지</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-1.11.3.js" type="text/javascript"></script>

  <script>






  </script>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- 슬라이드 -->
    <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/manager_main">
        <div>

        </div>
        <div>중고땅땅 관리자 <sup></sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- 메인-->
      <li class="nav-item active">
        <a class="nav-link" href="/manager_main">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Main</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        엄
      </div>


      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Addons
      </div>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="/manager_item">
          <i class="fas fa-fw fa-table"></i>
          <span>상품관리</span></a>
      </li>


      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="/manager_user">
          <i class="fas fa-fw fa-table"></i>
          <span>회원관리</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="/manager_policy">
          <i class="fas fa-fw fa-table"></i>
          <span>정책관리</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/manager_qna">
          <i class="fas fa-fw fa-table"></i>
          <span>Q&A관리</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>


          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>


            @if(session('login_ID') == false)
              <li><a href="/Login">Login</a></li>
              <li><a href="/sign_rull">sign up</a></li>
            @else

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                  관리자
              </span>
                <img class="img-profile rounded-circle" src="/img/r_heart.png">
              </a>
              <div class = "nav_login">
              </div>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
            @endif
          </ul>

          </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- 관리자페이지 -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">상품관리</h1>
          </div>




          {{-- 인터페이스 시작 --}}

          <div class="tableset">
            <div class="table1">
              <h4>상품정보</h4>
              <span></span>


              <table class="table-bordered table table-hover table-responsive"  style="width:40%;" >
                <tr>
                  <th style="width:10%;">상품이름</th>
                  <td style="width:10%;">{{$item[0]->item_name}}</td>
                </tr>
                <tr>
                  <th>상품번호</th>
                  <td>{{$item[0]->item_number}}</td>
                </tr>
                <tr>
                  <th>판매자아이디</th>
                  <td>{{$item[0]->seller_id}}</td>
                </tr>
                <tr>
                  <th>경매시작가</th>
                  <td>{{$item[0]->item_startprice}}</td>
                </tr>
                <tr>
                  <th>경매등록일</th>
                  <td>{{$item[0]->created_at}}</td>
                </tr>
                <tr>
                  <th>경매마감일</th>
                  <td>{{$item[0]->item_deadline}}</td>
                </tr>
                <tr>
                  <th>낙찰여부</th>
                  @if ($item[0]->item_success ==0)
                  <td>낙찰종료</td>
                @else
                  <td>진행중</td>
                  @endif
                </tr>
            </table>

          </div>
          <hr>
          <div class="table1" style="margin-top:3%;" >
            <h4>경매 참여 현황</h4>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
              <thead>
              <tr>
                <th>구매자아이디</th>
                <th>입찰금액</th>
                <th>입찰한시간</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($auction as $key => $value)
              <tr>
                <td>{{$value->buyer_ID}}</td>
                <td>{{$value->item_price}}</td>
                <td>{{$value->created_at}}</td>
              </tr>
                @endforeach
            </tbody>
            </table>

          </div>
          </div>
          <hr>
          @if ($item[0]->item_success ==0)
            <div class="table1" style="margin-top:3%;" >
              <h4>최종 낙찰 순위</h4>
                <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0" >
                  <thead>
                    <tr>
                      <th>순위</th>
                      <th>구매자아이디</th>
                      <th>입찰금액</th>
                      <th>구매여부</th>
                    </tr>
                  </thead>
                <tbody>
                  <tr>
                    <td>1순위</td>
                    @if (empty($auction[0]->buyer_ID))
                      <td></td>
                      @else
                        <td>{{$auction[0]->buyer_ID}}</td>
                    @endif
                    <td>{{$enditem[0]->success_price1}}</td>
                    @if (empty($auction[0]->buyer_ID))
                      <td></td>
                    @elseif($enditem[0]->success_user1 ==NULL)
                        <td>구매포기</td>
                    @elseif ($enditem[0]->buyer != $enditem[0]->success_user1)
                      <td>구매포기</td>
                    @elseif ($enditem[0]->buyer == $enditem[0]->success_user1)
                    <td>구매성공</td>
                  @endif
                  </tr>
                  <tr>
                    <td>2순위</td>
                    @if (empty($auction[1]->buyer_ID))
                      <td></td>
                      @else
                        <td>{{$auction[1]->buyer_ID}}</td>
                    @endif
                    <td>{{$enditem[0]->success_price2}}</td>
                    @if (empty($auction[1]->buyer_ID))
                      <td></td>
                    @elseif($enditem[0]->success_user2 == NULL)
                        <td>구매포기</td>
                    @elseif ($enditem[0]->buyer != NULL)
                      <td>구매포기</td>
                    @elseif ($enditem[0]->buyer == $enditem[0]->success_user2)
                    <td>구매성공</td>
                  @endif
                  </tr>
                  <tr>
                    <td>3순위</td>
                    @if (empty($auction[2]->buyer_ID))
                      <td></td>
                      @else
                        <td>{{$auction[2]->buyer_ID}}</td>
                    @endif

                    <td>{{$enditem[0]->success_price3}}</td>
                    @if (empty($auction[2]->buyer_ID))
                      <td></td>
                    @elseif($enditem[0]->success_user3 == NULL)
                        <td>구매포기</td>
                    @elseif ($enditem[0]->buyer != NULL)
                      <td>구매포기</td>
                    @elseif ($enditem[0]->buyer == $enditem[0]->success_user3)
                    <td>구매성공</td>
                  @endif
                  </tr>
                  <tr>
                    <td>4순위</td>
                    @if (empty($auction[3]->buyer_ID))
                      <td></td>
                      @else
                        <td>{{$auction[3]->buyer_ID}}</td>
                    @endif
                    <td>{{$enditem[0]->success_price4}}</td>
                    @if (empty($auction[3]->buyer_ID))
                      <td></td>
                    @elseif($enditem[0]->success_user4 ==NULL)
                        <td>구매포기</td>
                    @elseif ($enditem[0]->buyer != $enditem[0]->success_user4)
                      <td>구매포기</td>
                    @elseif ($enditem[0]->buyer == $enditem[0]->success_user4)
                    <td>구매성공</td>
                  @endif
                  </tr>
                  <tr>
                    <td>5순위</td>
                    @if (empty($auction[4]->buyer_ID))
                      <td></td>
                      @else
                        <td>{{$auction[4]->buyer_ID}}</td>
                    @endif
                    <td>{{$enditem[0]->success_price5 }}</td>
                    @if (empty($auction[4]->buyer_ID))
                      <td></td>
                    @elseif($enditem[0]->success_user5 ==NULL)
                        <td>구매포기</td>
                    @elseif ($enditem[0]->buyer != $enditem[0]->success_user5)
                      <td>구매포기</td>
                    @elseif ($enditem[0]->buyer == $enditem[0]->success_user5)
                    <td>구매성공</td>
                  @endif
                  </tr>
                </tbody>
              </table>
            </div>
            </div>
          @endif



        </div>
        <!-- Footer -->
        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright &copy; Your Website 2019</span>
            </div>
          </div>
        </footer>
        <!-- End of Footer -->

      </div>
      <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
        <!-- End of Main Content -->
        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">로그아웃 하시겠습니까</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">로그인화면으로 돌아갑니다.</div>
              <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">취소</button>
                <a class="btn btn-primary" href="/manager_logout">Logout</a>
              </div>
            </div>
          </div>
        </div>
        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/datatables-demo.js"></script>

</body>
</html>
