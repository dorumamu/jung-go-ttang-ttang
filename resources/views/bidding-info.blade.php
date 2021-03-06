@extends('layout.layout_main')

@section('title')
  중고땅땅-입찰정보
@endsection

@section('css')
<link rel="stylesheet" href ="/css/bidding-info.css"/>
@endsection

@section('js')

<script>
  $(function(){
     $("#sus_but").click(function(){
       var price=$(".bd_price1").attr("value");
       var bidprice=$(".bid_name").val();
       var num = Number(price);
       if( bidprice <= num){
         alert("낙찰가를 제대로 입력해 주세요");
         return false;
       }
       else
       {
          $("#popup").fadeIn();
          $(".exit").click(function(){
            $("#popup").fadeOut();
          });
       };
     });
   });
   $(function(){
    $(".bid_name").keyup(function(){
      var ip = $(".bid_name").val();
      console.log(ip)
      $("#moneyid").text(ip);
    });
    $('.bid_name').keydown(function() {
  if (event.keyCode === 13) {
    event.preventDefault();
  };
});
  });
</script>

@endsection

@section('content')
@if(session()->has('login_ID'))
  @if(decrypt(session()->get('login_ID')) == $sendd[0]->seller_id)
    <script>
      alert("접근할수없습니다.")
      window.history.back();
    </script>
  @else
    @if ($sendd[0]->item_success==1)
      <form class="" name="bd_form" method="post" action="{{url('/bidding-price')}}"  onsubmit="">
      @csrf
        <div id ="popup">
          <div id="popmenu">
            <h1>입찰확인</h1>
            <hr>
            <div class="" style="margin-top:3%; margin-bottom:3%;">
              <h4>단, 무분별한 입찰은 제제대상이 될 수 있습니다.</h4>
            </div>
            <hr>
            <p class="po1"><h2>입찰 하시겠습니까?</h2></p>
            <hr>
            <p><h2>
              <span>입찰금액:</span>
              <span id="moneyid"></span>
              <span>원</span>
            </h2></p>
            <hr>
            <p><b>
              <span>ID:</span>
              <span>{{$ids}}</span>
            </b></p>


            <div class="exit">
              <button type="submit" class="mo_but" name="button">입찰</button>
              <button type="button" class="mo_but" name="button">닫기</button>
            </div>
          </div>
        </div>
      <input type="hidden" name="num_s" value='{{$sendd[0]->item_number}}'>
      <div class="bd_layout">
        <div class="bd_form">
          <div class="bd_header">
              <div class="bd_head">
                <span class="bd_headname">입찰정보</span>
              </div>
          </div>
        <div class="bd_if">
          <div class="bd_main">
          <img class="bd_img" src="/img/item/{{$sendd[0]->item_picture}}">
        </div>
        <div class="bd_main2">
          <div class="bd_name">
            <span class="bd_name1">{{$sendd[0]->item_name}}</span>
          </div>
          <div class="bd_price">
            <span>현재가격:</span>
            @if ($max==0)
            <span class="bd_price1" value="{{$sendd[0]->item_startprice}}">{{number_format($sendd[0]->item_startprice)}}</span>
            @else
            <span class="bd_price1" value="{{$max}}">{{ number_format($max)}}</span>
            @endif
            <span> 원</span>
          </div>
          <div class="bd_stprice">
            <span>시작가격:</span>
            <span class="bd_stprice1" name="money1" >{{number_format($sendd[0]->item_startprice)}}</span>
            <span>원</span>
          </div>
          <div class="bd_bid">
            <span clsss="bid_pr"><b>입찰할금액:</b></span>
            <input type="hidden" name="" value="">
            <input type="number" class="bid_name"  name="bdinput" placeholder="현재가격이상으로 설정해주세요">
          </div>
        </div>
        </div>
        <div class="but_head">
          <div class="bd_button">
            <button type="button" class="bd_but1"  onclick="history.back(-1);">취소하기</button>
          </div>
          <div class="bd_button">
            <button type="button" class="bd_but1" id="sus_but">입찰하기</button>
          </div>
        </div>
        </div>
      </div>
      </div>
      </form>
    @else
    <h1 style="text-align:center; margin-top:20%; margin-bottom:20%;">이미 판매된 상품입니다.</h1>
  @endif
@endif
@endif
@endsection
