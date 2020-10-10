<?php

namespace App\Http\Controllers;

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
       //注文フォーム入力内容をセッションから削除
       $request->session()->forget('formParams');

       return view('order');
     }

     /**
      * Display the order check.
      * @return \Illuminate\Http\Response
      */
      public function orderCheck(OrderValidateRequest $request)
      {

        $formParams = $request->all();

        /*
        $formParams = [];
        $formParams['name'] = $request->name;
        $formParams['name_kana'] = $request->name_kana;
        $formParams['zip'] = $request->zip;
        $formParams['pref'] = $request->pref;
        $formParams['address1'] = $request->address1;
        $formParams['address2'] = $request->address2;
        $formParams['tel'] = $request->tel;
        $formParams['email'] = $request->email;
        $formParams['email2'] = $request->email2;*/

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
         //$formParams = [];

         $formParams = $request->all();

/*
         $formParams['name'] = $request->name;
         $formParams['name_kana'] = $request->name_kana;
         $formParams['zip'] = $request->zip;
         $formParams['pref'] = $request->pref;
         $formParams['address1'] = $request->address1;
         $formParams['address2'] = $request->address2;
         $formParams['tel'] = $request->tel;
         $formParams['email'] = $request->email;
         $formParams['email2'] = $request->email2;
         $formParams['memo'] = $request->memo;
*/

         if($request->submit == 'send'){

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

           $order->save();

           /*
           Order::create([
             'name' => $formParams['name'],
             'name_kana' => $formParams['name_kana'],
             'zip' => $formParams['zip'],
             'address1' => $formParams['address1'],
             'address2' => $formParams['address2'],
             'tel' => $formParams['tel'],
             'email' => $formParams['email']
           ]);
           */

           return view('order_comp');
         }
         elseif($request->submit == 'back'){
           return redirect('/order')->withInput();
         }

       }

}
