<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sporttype extends Model
{
    protected $table = 'sportstype';
    protected $fillable = ['name','description'];
}
