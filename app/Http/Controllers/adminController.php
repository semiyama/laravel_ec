<?php

namespace App\Http\Controllers;

use App\Item_category;
use App\Items;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    /**
     * Display the login form.
     *
     * @param  \App\Item_category  $item_category
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
      return view('admin/login');
    }


}
