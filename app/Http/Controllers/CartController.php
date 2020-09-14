<?php

namespace App\Http\Controllers;

use App\Item_category;
use App\Items;
use Illuminate\Http\Request;

class CartController extends Controller
{

    /**
     * Display the Shopping cart.
     *
     * @param  \App\Item_category  $item_category
     * @return \Illuminate\Http\Response
     */
    public function cart()
    {
      return view('cart');
    }

    /**
     * Display the order form.
     *
     * @param  \App\Items  $items
     * @return \Illuminate\Http\Response
     */
     public function orderForm()
     {
       return view('order');
     }

     /**
      * Display the order check.
      *
      * @param  \App\Items  $items
      * @return \Illuminate\Http\Response
      */
      public function orderCheck()
      {
        return view('order_check');
      }

      /**
       * Display the order complete.
       *
       * @param  \App\Items  $items
       * @return \Illuminate\Http\Response
       */
       public function orderComp()
       {
         return view('order_comp');
       }

}
