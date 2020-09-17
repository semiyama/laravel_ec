<?php

namespace App\Http\Controllers;

use App\Item_category;
use App\Items;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    /**
     * Display the login form.
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
      return view('admin/login');
    }

    /**
     * Display the admin system home.
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
      return view('admin/home');
    }

    /**
     * Display the order list.
     * @return \Illuminate\Http\Response
     */
    public function orderList()
    {
      return view('admin/order_list');
    }


    /**
     * Display the order detail.
     * @return \Illuminate\Http\Response
     */
    public function orderDetail()
    {
      return view('admin/order_detail');
    }

    /**
     * Display the item list.
     * @return \Illuminate\Http\Response
     */
    public function itemList()
    {
      return view('admin/item_list');
    }

    /**
     * Display the item detail.
     * @return \Illuminate\Http\Response
     */
    public function itemDetail()
    {
      return view('admin/item_detail');
    }

}
