<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organizator extends Model
{
    protected $fillable = ['name','mission','founder'];
}
