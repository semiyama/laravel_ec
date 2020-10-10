<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  /**
   * 複数代入する属性
   *
   * @var array
   */
  protected $fillable = ['name'];
}
