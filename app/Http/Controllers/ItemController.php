<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Item;
use App\User;
use App\Auction;
use App\Favorite;
use Image;
use Session;
use DB;

class ItemController extends Controller
{
  public function store(Request $request){
      $item_pic = $request->file('item_picture');
      $item_picture= $item_pic->getClientOriginalName();
      Image::make($item_pic)->save(public_path('/img/item/'.$item_picture));

      if($request->hasFile('item_picturefront')){
        $item_pic = $request->file('item_picturefront');
        $item_picturefront = $item_pic->getClientOriginalName();
        Image::make($item_pic)->save(public_path('/img/item/'.$item_picturefront));
      }
      else {
        $item_picturefront = null;
      }

      if($request->hasFile('item_pictureup')){
        $item_pic = $request->file('item_pictureup');
        $item_pictureup = $item_pic->getClientOriginalName();
        Image::make($item_pic)->save(public_path('/img/item/'.$item_pictureup));
      }
      else {
        $item_pictureup = null;
      }

      if($request->hasFile('item_pictureback')){
        $item_pic = $request->file('item_pictureback');
        $item_pictureback = $item_pic->getClientOriginalName();
        Image::make($item_pic)->save(public_path('/img/item/'.$item_pictureback));
      }
      else {
        $item_pictureback = null;
      }

      if($request->hasFile('item_pictureleft')){
        $item_pic = $request->file('item_pictureleft');
        $item_pictureleft = $item_pic->getClientOriginalName();
        Image::make($item_pic)->save(public_path('/img/item/'.$item_pictureleft));
      }
      else {
        $item_pictureleft = null;
      }

      if($request->hasFile('item_picturerigth')){
        $item_pic = $request->file('item_picturerigth');
        $item_picturerigth = $item_pic->getClientOriginalName();
        Image::make($item_pic)->save(public_path('/img/item/'.$item_picturerigth));
      }
      else {
        $item_picturerigth = null;
      }

      if($request->hasFile('item_picturebehind')){
        $item_pic = $request->file('item_picturebehind');
        $item_picturebehind = $item_pic->getClientOriginalName();
        Image::make($item_pic)->save(public_path('/img/item/'.$item_picturebehind));
      }
      else {
        $item_picturebehind = null;
      }

      $item = new Item([
        'item_name' => $request->get('product_name'),
        'item_maker' => $request->get('product_maker'),
        'item_buy' => $request->get('product_buy'),
        'item_category' => $request->get('product_category'),
        'item_open' => $request->get('select_state'),
        'item_deadline' => $request->get('Auction_last_time'),
        'item_startday' => date('Y-m-d'),
        'item_picture' => $item_picture,
        'item_pictureup' => $item_pictureup,
        'item_pictureback' => $item_pictureback,
        'item_pictureleft' => $item_pictureleft,
        'item_picturerigth' => $item_picturerigth,
        'item_picturebehind' => $item_picturebehind,
        'item_picturefront' => $item_picturefront,
        'item_info' => $request->get('item_info'),
        'item_startprice' => $request->get('Auction_start'),
        'item_success' => true,
        'success' => false,
        'seller_id' => decrypt(session()->get('login_ID'))
      ]);
      $item->save();
      return redirect('/itemcheck');
      //return view(''); 내가 올린 경매 페이지로 이동
    }

  public function sending_num(Request $request){
    $sending = $request->get('item_key');
    return view('/product-Modify',[
      'sending' => $sending
    ]);
  }

  public function product_update(Request $request){
    $uwiei= $request->get('uwiei');
    $id=session()->get('login_ID');
    $item_pic = $request->file('item_picture');
    $item_picture= $item_pic->getClientOriginalName();
    Image::make($item_pic)->save(public_path('/img/item/'.$item_picture));

    if($request->hasFile('item_picturefront')){
      $item_pic = $request->file('item_picturefront');
      $item_picturefront = $item_pic->getClientOriginalName();
      Image::make($item_pic)->save(public_path('/img/item/'.$item_picturefront));
    }
    else {
      $item_picturefront = null;
    }

    if($request->hasFile('item_pictureup')){
      $item_pic = $request->file('item_pictureup');
      $item_pictureup = $item_pic->getClientOriginalName();
      Image::make($item_pic)->save(public_path('/img/item/'.$item_pictureup));
    }
    else {
      $item_pictureup = null;
    }

    if($request->hasFile('item_pictureback')){
      $item_pic = $request->file('item_pictureback');
      $item_pictureback = $item_pic->getClientOriginalName();
      Image::make($item_pic)->save(public_path('/img/item/'.$item_pictureback));
    }
    else {
      $item_pictureback = null;
    }

    if($request->hasFile('item_pictureleft')){
      $item_pic = $request->file('item_pictureleft');
      $item_pictureleft = $item_pic->getClientOriginalName();
      Image::make($item_pic)->save(public_path('/img/item/'.$item_pictureleft));
    }
    else {
      $item_pictureleft = null;
    }

    if($request->hasFile('item_picturerigth')){
      $item_pic = $request->file('item_picturerigth');
      $item_picturerigth = $item_pic->getClientOriginalName();
      Image::make($item_pic)->save(public_path('/img/item/'.$item_picturerigth));
    }
    else {
      $item_picturerigth = null;
    }

    if($request->hasFile('item_picturebehind')){
      $item_pic = $request->file('item_picturebehind');
      $item_picturebehind = $item_pic->getClientOriginalName();
      Image::make($item_pic)->save(public_path('/img/item/'.$item_picturebehind));
    }
    else {
      $item_picturebehind = null;
    }
      $update=Item::where(['item_number'=> $uwiei])->update([
        'item_name'=> $request->get('product_name'),
        'item_maker'=> $request->get('product_maker'),
        'item_buy'=>$request->get('product_buy'),
        'item_category'=>$request->get('product_category'),
        'item_open'=>$request->get('open'),
        'item_deadline'=>$request->get('Auction_last_time'),
        'item_startprice'=>$request->get('Auction_start'),
        'item_picture'=>$item_picture,
        'item_picturefront'=>$item_picturefront,
        'item_pictureup'=>$item_pictureup,
        'item_pictureback'=>$item_pictureback,
        'item_pictureleft'=>$item_pictureleft,
        'item_picturerigth'=>$item_picturerigth,
        'item_picturebehind'=>$item_picturebehind,
        'item_info' =>$request->get('item_info')
      ]);
   return redirect('/');
   }

  public function mainview(Request $request){
      //$top = 시간당 조회수가 높은 페이지에 item_nurnber를 가져온다
      $topview = Item::select('item_name', 'item_buy', 'item_picture')->where(['item_number'=>$top])->get();
      return view('main', [
        'item_name' => $topview[0]->item_name,
        'item_buy' => $topview[0]->item_buy,
        'item_picture' => $topview[0]->item_picture
      ]);
    }

  public function myview(Request $request){
      $id = session()->get('login_ID');
      $myStat = Item::select('item_number', 'item_name', 'item_picture', 'item_startprice', 'item_success', 'success')->where(['seller_id'=> decrypt($id)])->get();
      $Auction = Auction::join('items', 'items.item_number','=', 'auction.auction_itemnum')->select(
        'item_price',
        'item_number',
        'item_name',
        'item_picture',
        'item_startprice',
        'item_success',
        'success'
        )->where(['buyer_ID'=>decrypt($id)])->get();
      return view('itemcheck', [
        'myStat' => $myStat,
        'myAuction' => $Auction
      ]);
    }

  public function itemview($item_number){
      $id= session()->get('login_ID');
      $myproduct= Item::select('*')->where(['item_number'=>$item_number])->get();
      $data = User::select('user_image')->where(['id' =>  $myproduct[0]->seller_id])->get();
        return view('product-detail', [
        'myproduct' => $myproduct,
        'data'=>$data
      ]);
    }

  public function category(Request $request){
      $cat = $_GET['id'];
      $cate=Item::select('item_number','item_name','item_picture','item_startprice')->where(['item_category'=>$cat])->get();
      $cateF = count($cate);
        return view('manclothing',[
          'cate'=>$cate,
          'cateF' => $cateF
        ]);
      }

  public function favorite_item(Request $request){
    $id= session()->get('login_ID');
    $item_num = $request->get('likejim');
    $favorite = new Favorite([
      'favorite_itemnum'=>$request->get('likejim'),
      'favorite_name'=>decrypt($id)
    ]);
    $favorite->save();
    $wish_itm = Favorite::join('items','favorite.favorite_itemnum','=', 'items.item_number')->select('item_name','item_startprice','item_picture')->where(['favorite_itemnum'=>$item_num,'favorite_name'=>$id])->get();
    return view ('wish_list',[
      'wish_itm' => $wish_itm
    ]);

  }
}
