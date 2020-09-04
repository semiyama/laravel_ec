<?php

namespace App\Http\Controllers;

use App\Items;
use App\Item_category;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $items = Items::all();
        dump($items);

        //$itemCategories = Item_category::all();
        //dump($itemCategories);

        return view('index', ['items' => $items]);
    }
}
