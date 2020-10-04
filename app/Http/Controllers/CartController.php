<?php

namespace App\Http\Controllers;

use App\Item_category;
use App\Items;
use Illuminate\Http\Request;
use App\Rules\japaneseZip;

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
       //dump($errors);
       dump($request->zip);

       return view('order');
     }

     /**
      * Display the order check.
      * @return \Illuminate\Http\Response
      */
      public function orderCheck(Request $request)
      {

        $formParams = [];
        $formParams['name'] = $request->name;
        $formParams['name_kana'] = $request->name_kana;
        $formParams['zip'] = $request->zip;
        $formParams['pref'] = $request->pref;
        $formParams['address1'] = $request->address1;
        $formParams['address2'] = $request->address2;
        $formParams['tel'] = $request->tel;
        $formParams['email'] = $request->email;

        // validation
        $rules = [
            'name' => ['required'],
            'name_kana' => ['required'],
            'zip' => ['required', new JapaneseZip],
            'pref' => ['required'],
            'address1' => ['required'],
            'address2' => ['required'],
            'tel' => ['required'],
            'email' => ['required']
        ];

        $errMsg = [
          'name.required' => 'お名前は必須項目です。',
          'name_kana.required'  => 'お名前（カナ）は必須項目です。',
          'zip.required'  => '郵便番号は必須項目です。',
          'pref.required'  => '都道府県は必須項目です。',
          'address1.required'  => '住所1は必須項目です。',
          'address2.required'  => '住所2は必須項目です。',
          'tel.required'  => '電話番号は必須項目です。',
          'email.required'  => 'メールアドレスは必須項目です。'
        ];

        $this->validate($request, $rules, $errMsg);

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
