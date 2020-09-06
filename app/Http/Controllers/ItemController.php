<?php

namespace App\Http\Controllers;

use App\Item_category;
use App\Items;
use Illuminate\Http\Request;

class ItemController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  \App\Item_category  $item_category
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request, $id, Item_category $item_category)
    {
      $category = Item_category::find($id);

      return view('category', ['category' => $category, 'items' => $category->Items]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function detail(Request $request, $id, Items $items)
    {
      $item = Items::find($id);

      return view('detail', ['item' => $item]);
    }

}
