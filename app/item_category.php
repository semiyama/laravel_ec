<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item_category extends Model
{


    public function Items()
    {
      return $this->hasMany('App\Items', 'category');
    }
}
