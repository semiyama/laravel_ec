<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Item_category;
use App\Items;
use App\Order_item;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Requests\OrderValidateRequest;

class CartController extends Controller
{

    /**
     * Display the Shopping cart.
     * @return \Illuminate\Http\Response
     */
    public function cart(Request $request)
    {
      //カートに入っている商品のデータをモデルから取得
      $temp = Items::all();

      $items = [];
      foreach($temp as $val){
        $items[$val['id']] = $val;
      }

      return view('cart', ['items' => $items, 'cartItems' => $request->session()->get('cart')]);
    }

    /**
     * Add Item To Cart.
     * @return \Illuminate\Http\Response
     */
    public function cartAdd(Request $request)
    {
      //追加する商品の値を取得
      $newItem = [];
      $newItem['itemId'] = $request->itemId;
      $newItem['num'] = $request->num;
      $newItem['timeStamp'] = time();

      // validation
      $rules = [
          'itemId' => ['required', 'integer'],
          'num' => ['required', 'integer']
      ];

      $errMsg = [
        'itemId.integer' => '商品IDを正しく入力してください。',
        'num.integer'  => '個数を正しく入力してください。'];

      $this->validate($request, $rules, $errMsg);

      //セッションに商品追加
      $request->session()->push('cart', $newItem);

      return redirect('/cart');
    }

    /**
     * Delete Item From Cart.
     * @return \Illuminate\Http\Response
     */
    public function cartDelete(Request $request)
    {

      //セッションからカート情報取得
      $cartData = $request->session()->get('cart');

      //カート情報から指定キーを削除
      $deleteItemTs = $request->timeStamp;

      foreach($cartData as $k => $val){
        if($val['timeStamp'] == $deleteItemTs){
          unset($cartData[$k]);
        }
      }

      //セッションにカート情報を戻す
      $request->session()->put('cart', $cartData);

      return redirect('/cart');
    }

    /**
     * Display the order form.
     * @return \Illuminate\Http\Response
     */
     public function orderForm(Request $request)
     {

      header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");

       //カートのセッションに商品データが無い場合、カートにリダイレクト
       $cartItems = $request->session()->get('cart');
       if(!is_array($cartItems) || count($cartItems) == 0){
         return redirect('/cart');
       }

       return view('order');
     }

     /**
      * Display the order check.
      * @return \Illuminate\Http\Response
      */
      public function orderCheck(OrderValidateRequest $request)
      {
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");


        //カートのセッションに商品データが無い場合、カートにリダイレクト
        $cartItems = $request->session()->get('cart');
        if(!is_array($cartItems) || count($cartItems) == 0){
          return redirect('/cart');
        }

        $formParams = $request->all();

        //カートに入っている商品のデータをモデルから取得
        $temp = Items::all();

        $items = [];
        foreach($temp as $val){
          $items[$val['id']] = $val;
        }

        return view('order_check', ['formParams' => $formParams, 'items' => $items, 'cartItems' => $request->session()->get('cart')]);
      }

      /**
       * Display the order complete.
       * @return \Illuminate\Http\Response
       */
       public function orderComp(request $request)
       {

        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");

         //カートのセッションに商品データが無い場合、カートにリダイレクト
         $cartItems = $request->session()->get('cart');
         if(!is_array($cartItems) || count($cartItems) == 0){
           return redirect('/cart');
         }

         $formParams = $request->all();

         if($request->submit == 'send'){

           $return = DB::transaction(function () use ($cartItems, $formParams) {
             $order = new Order;
             $order->name = $formParams['name'];
             $order->name_kana = $formParams['name_kana'];
             $order->zip = $formParams['zip'];
             $order->pref = $formParams['pref'];
             $order->address1 = $formParams['address1'];
             $order->address2 = $formParams['address2'];
             $order->tel = $formParams['tel'];
             $order->email = $formParams['email'];
             $order->memo = $formParams['memo'];

             //開発中。とりあえず０
             $order->deliv_price = 0;

             //注文テーブルに書き込み
             $result1 = $order->save();

             //直前に書き込んだ注文データのIDを取得
             $lastInsertId = $order->id;

             //商品テーブルのデータ取得
             $temp = Items::all();
             $items = [];
             foreach($temp as $val){
               $items[$val['id']] = $val;
             }

             foreach($cartItems as $k => $val){
               $itemId = $val['itemId'];
               $orderItem = new Order_item;
               $orderItem->order_id = $lastInsertId;
               $orderItem->item_id = $itemId;
               $orderItem->price = $items[$itemId]['price'];
               $orderItem->num = $val['num'];
               $result2 = $orderItem->save();
             }

             //注文テーブル、注文アイテムテーブルの書き込みが両方成功
             if($result1 && $result2){
               $return['lastInsertId'] = $lastInsertId;
               $return['saveResult'] = true;
               return $return;
             }else{
              $return['lastInsertId'] = '';
              $return['saveResult'] = false;
              return $return;
             }
           });

           if($return['saveResult']){
             //カートのセッションを削除
             $request->session()->forget('cart');

             //注文完了画面を表示
              return view('order_comp', ['orderId' => $return['lastInsertId']]);
           }else{
             return redirect('/cart');
           }


         }
         elseif($request->submit == 'back'){
           return redirect('/order')->withInput();
         }

       }

}
