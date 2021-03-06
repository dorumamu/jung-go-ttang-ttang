@extends('layout.layout_main')
@section('title')
중고땅땅-내위치 상품정보
@endsection
@section('css')
<link rel="stylesheet" href="/css/mylocatino.css">
@endsection

@section('js')
<script type="text/javascript"
src="//dapi.kakao.com/v2/maps/sdk.js?appkey=8a82332350bc18d282d500e361ee79da&libraries=services">
</script>
<script>
$(document).ready(function(){

  var mapContainer = document.getElementById('map'), // 지도를 표시할 div
  mapOption = {
    center: new kakao.maps.LatLng(33.450701, 126.570667), // 지도의 중심좌표
    level: 7 // 지도의 확대 레벨
  };

  // 지도를 생성합니다
  var map = new kakao.maps.Map(mapContainer, mapOption);

  // 일반 지도와 스카이뷰로 지도 타입을 전환할 수 있는 지도타입 컨트롤을 생성합니다
  var mapTypeControl = new kakao.maps.MapTypeControl();

  // 지도에 컨트롤을 추가해야 지도위에 표시됩니다
  // kakao.maps.ControlPosition은 컨트롤이 표시될 위치를 정의하는데 TOPRIGHT는 오른쪽 위를 의미합니다
  map.addControl(mapTypeControl, kakao.maps.ControlPosition.TOPRIGHT);

  // 지도 확대 축소를 제어할 수 있는  줌 컨트롤을 생성합니다
  var zoomControl = new kakao.maps.ZoomControl();
  map.addControl(zoomControl, kakao.maps.ControlPosition.RIGHT);

  // HTML5의 geolocation으로 사용할 수 있는지 확인합니다
  if (navigator.geolocation) {
      // GeoLocation을 이용해서 접속 위치를 얻어옵니다
      navigator.geolocation.getCurrentPosition(function(position) {

        let lat = position.coords.latitude, // 위도
        lon = position.coords.longitude; // 경도

        // 마커가 표시될 위치를 geolocation으로 얻어온 좌표로 생성합니다
        var locPosition = new kakao.maps.LatLng(lat, lon),
      // 인포윈도우에 표시될 내용입니다
      message = '<div class="locationmy">현재 사용자의 위치입니다</div>';

      // 마커와 인포윈도우를 표시합니다
      displayMarker(locPosition, message);
    });

  } else { // HTML5의 GeoLocation을 사용할 수 없을때 마커 표시 위치와 인포윈도우 내용을 설정합니다

    var locPosition = new kakao.maps.LatLng(33.450701, 126.570667),
    message = 'geolocation을 사용할수 없어요..'

    displayMarker(locPosition, message);
  }
  // 지도에 마커와 인포윈도우를 표시하는 함수입니다
  function displayMarker(locPosition, message) {
    // 마커 이미지의 이미지 주소입니다
    var imageSrc = "https://t1.daumcdn.net/localimg/localimages/07/mapapidoc/markerStar.png";
    // 마커 이미지의 이미지 크기 입니다
    var imageSize = new kakao.maps.Size(24, 35);
    // 마커 이미지를 생성합니다
    var markerImage = new kakao.maps.MarkerImage(imageSrc, imageSize);
    // 마커를 생성합니다
    var markers = new kakao.maps.Marker({
      map: map,
      position: locPosition,
      image : markerImage // 마커 이미지
    });

    var iwContent = message, // 인포윈도우에 표시할 내용
    iwRemoveable = true;

    // 인포윈도우를 생성합니다
    var infowindow = new kakao.maps.InfoWindow({
      content : iwContent,
      removable : iwRemoveable
    });

    // 인포윈도우를 마커위에 표시합니다
    infowindow.open(map, markers);

    // 지도 중심좌표를 접속위치로 변경합니다
    map.setCenter(locPosition);
  }


  // 주소-좌표 변환 객체를 생성합니다
  var geocoder = new kakao.maps.services.Geocoder();

  var mapname = $('.mapname');
  var mapid = $('.mapip');
  var positions = $('.maparry');
  var mappicture = $('.mappicture');
  var mapstartprice = $('.mapstartprice')
  var mapproduct = $('.mapproduct');
  var rodcount = {{count($road)}};
  // console.log(id);
  var add = [];
  var id = [];
  var name = [];
  var picture = [];
  var startprice = [];
  var product = [];
  var makers = [];

  for (i = 0; i < mapproduct.length; i++) {
    product.push(mapproduct[i].value);
  }
  for (i = 0; i < mapstartprice.length; i++) {
    startprice.push(mapstartprice[i].value);
  }
  for (i = 0; i < mappicture.length; i++) {
    picture.push(mappicture[i].value);
  }
  // console.log(picture);
  for (i = 0; i < mapname.length; i++) {
    name.push(mapname[i].value);
  }
  for (i = 0; i < mapid.length; i++) {
    id.push(mapid[i].value);
  }
  for(i=0; i<positions.length;i++){
    add.push(positions[i].value);
  }
  for(let i=0; i <add.length; i++){
    // console.log(add[i]);
    geocoder.addressSearch(add[i], function(result, status) {

      // 정상적으로 검색이 완료됐으면
      if (status === kakao.maps.services.Status.OK) {

        var coords = new kakao.maps.LatLng(result[0].y, result[0].x);

        // 결과값으로 받은 위치를 마커로 표시합니다
        var marker = new kakao.maps.Marker({
          map: map,
          position: coords
        });
        // markers.push(marker);
        var link = mapproduct[i];
        var pic = picture[i];
        console.log(marker);
        // iwRemoveable = true; // removeable 속성을 ture 로 설정하면 인포윈도우를 닫을 수 있는 x버튼이 표시됩니다
        var iwContent =
        '<div class="wrap">' +
        '    <div class="info">' +
        '        <div class="title">' + name[i] +
        '          <div class="close" onclick="closeOverlay()" title="닫기"></div>' +
        '        </div>'+
        '        <div class="body">' +
        '            <div class="img">' +
        '                  <img src="/img/item/'+pic+'" width="73" height="70">' +
        '            </div>' +
        '            <div class="desc">' +
        '                <div class="ellipsis">'+ add[i]+'</div>' +
        '                <div class="jibun ellipsis">판매자 :'+ id[i] +'</div>' +
        '                <div class="stapri">경매 시작가격 : ' + startprice[i] + '</div>'+
        '                <div><a href="/product-detail/'+product[i]+'" target="_self" class="link">상품 바로가기</a></div>' +
        '            </div>' +
        '        </div>' +
        '    </div>' +
        '</div>', // 인포윈도우에 표출될 내용으로 HTML 문자열이나 document element가 가능합니다
        iwRemoveable = true;

        // 인포윈도우를 생성합니다
        var infowindow = new kakao.maps.InfoWindow({
          content : iwContent,
          removable : iwRemoveable
        });

        // 마커에 클릭이벤트를 등록합니다
        kakao.maps.event.addListener(marker, 'click', function() {
          // 마커 위에 인포윈도우를 표시합니다
          infowindow.open(map, marker);
        });
        // var radius = 1000;
        var circle = new kakao.maps.Circle({
          center :locPosition,  // 원의 중심좌표 입니다
          radius: 3000, // 미터 단위의 원의 반지름입니다
          strokeWeight: 5, // 선의 두께입니다
          strokeColor: '#75B8FA', // 선의 색깔입니다
          strokeOpacity: 1, // 선의 불투명도 입니다 1에서 0 사이의 값이며 0에 가까울수록 투명합니다
          strokeStyle: 'dashed', // 선의 스타일 입니다
          fillColor: '#CFE7FF', // 채우기 색깔입니다
          fillOpacity: 0.05  // 채우기 불투명도 입니다
        });

        $("input:radio[name=chk_km]").change(function(){
          var locPosition = map.getCenter();
          var line = new kakao.maps.Polyline();
          if ($('input:radio[name=chk_km]:checked').val() == "1km") {
            var radius = 1000;
            circle.setMap(map);
            circle.setPosition(locPosition);
            circle.setRadius(radius);
          }
          if($('input:radio[name=chk_km]:checked').val() == "3km") {
            var radius = 3000;
            circle.setMap(map);
            circle.setPosition(locPosition);
            circle.setRadius(radius);
          }
          if($('input:radio[name=chk_km]:checked').val() == "5km") {
            var radius = 5000;
            circle.setMap(map);
            circle.setPosition(locPosition);
            circle.setRadius(radius);
          }
          if($('input:radio[name=chk_km]:checked').val() == "all_maker") {
            var radius = 100000;
            circle.setMap(null);
          }
          // console.log(radius);
          // 상품을 표시할 원의 반경 미터
          var c1 = map.getCenter(locPosition);
          var c2 = marker.getPosition();
          // 지도에 표시할 원을 생성합니다
          // 지도에 원을 표시합니다
          var poly = new kakao.maps.Polyline({
            path: [c1, c2]
          });
          // console.log(path);
          var dist = poly.getLength(); // m 단위로 리턴
          if (dist < radius) {
            marker.setMap(map);
          } else {
            marker.setMap(null);
          }
        });
        // // 지도의 중심을 결과값으로 받은 위치로 이동시킵니다
        //map.setCenter(locPosition);
      }
    });
  }
});
</script>
@endsection
@section('content')
@foreach($myproduct as $key => $value)
<input  id="mapproduct{{$value->item_number}}" class ="mapproduct" type="hidden"  value="{{$value->item_number}}">
@endforeach
@foreach($myproduct as $key => $value)
<input  id="mapstartprice{{$value->item_number}}" class ="mapstartprice" type="hidden"  value="{{$value->item_startprice}}">
@endforeach
@foreach($myproduct as $key => $value)
<input  id="mappicture{{$value->item_number}}" class ="mappicture" type="hidden"  value="{{$value->item_picture}}">
@endforeach
@foreach($myproduct as $key => $value)
<input  id="mapname{{$value->item_number}}" class ="mapname" type="hidden"  value="{{$value->item_name}}">
@endforeach
@foreach($myproduct as $key => $value)
<input  id="mapip{{$value->item_number}}" class ="mapip" type="hidden"  value="{{$value->seller_id}}">
@endforeach
@foreach($road as $key => $value)
<input  id="maparry{{$value->item_number}}" class ="maparry" type="hidden"  value="{{$value->roadAddress}}">
@endforeach
<div class="controller">
<div class="lie">
<input class="illkm rad" type="radio" name="chk_km" value="1km" ><p>1km</p>
</div>
<div class="lie">
<input class="samkm rad" type="radio" name="chk_km" value="3km"><p>3km</p>
</div>
<div class="lie">
<input class="okm rad" type="radio" name="chk_km" value="5km"><p>5km</p>
</div>
<div class="lie">
<input class="allkm rad" type="radio" name="chk_km" value="all_maker" checked="checked"><p>모두보기</p>
</div>
</div>
<div id="map">
<div class="wa d">
<a href="#" class="hi"></a>
</div>
</div>
<div class="jidosul">
<p>PC에서는 사용자의 정확한 위치가 나오지 않을 수 있습니다...!</p>
<p>이점 참고해주세요!!</p>
</div>
@endsection
