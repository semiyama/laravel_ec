<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    public function item_category()
    {
      return $this->belongsTo('App\item_category', 'category');
    }
}
