<?php

namespace App\Http\Controllers;

use App\Item_category;
use App\Items;
use Illuminate\Http\Request;

class CartController extends Controller
{

    /**
     * Display the Shopping cart.
     * @return \Illuminate\Http\Response
     */
    public function cart(Request $request)
    {
      //カートに入っている商品のデータをモデルから取得
      $items = [];
      foreach($request->session()->get('cart') as $k => $val){
        $items[$val['itemId']] = Items::find($val['itemId']);
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

      // validation
      $rules = [
          'itemId' => ['required', 'integer'],
          'num' => ['required', 'integer']
      ];

      $errMsg = [
        'itemId.array' => '商品IDを正しく入力してください。',
        'num.array'  => '個数を正しく入力してください。'];

      $this->validate($request, $rules, $errMsg);

      //セッションに商品追加
      $request->session()->push('cart', $newItem);



      //$items = Items::all();
      //dump($items);

      //return view('cart', ['items' => $items, 'cartItems' => $request->session()->get('cart')]);

      return redirect('/cart');
    }

    /**
     * 定義済みバリデーションルールのエラーメッセージ取得
     *
     * @return array
     */
    public function messages()
    {
        return [
          'itemId.required' => '商品IDは必須です。',
          'num.required'  => '個数は必須です。',
        ];
    }

    /**
     * Display the order form.
     * @return \Illuminate\Http\Response
     */
     public function orderForm()
     {
       return view('order');
     }

     /**
      * Display the order check.
      * @return \Illuminate\Http\Response
      */
      public function orderCheck()
      {
        return view('order_check');
      }

      /**
       * Display the order complete.
       * @return \Illuminate\Http\Response
       */
       public function orderComp()
       {
         return view('order_comp');
       }

}
