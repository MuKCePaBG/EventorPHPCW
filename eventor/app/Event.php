<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable=['name','date','duration','sportstype_id','organizator_id'];
}
