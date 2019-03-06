<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class APIModel extends Model
{
	use SoftDeletes;

  protected $appends = ['temp'=>null];

  public function setAppend($index='',$value){
    data_set($this->appends,$index,$value);
  }

  public function getAppend($index=null){
    return filled($index) ? data_get($this->appends,$index) : $this->appends;
  }
}