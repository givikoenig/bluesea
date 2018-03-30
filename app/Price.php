<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    //
    protected $fillable = ['name','alias','position','price','period','storage','bandwidth','esupport','support'];
}
