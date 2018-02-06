<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable=['name','date','duration','sportstype_id','organizator_id'];

    public function sportstypes()
    {
        return $this->belongsTo('App\Sporttype','sportstype_id','id');
    }

    public function organizators()
    {
        return $this->belongsTo('App\Organizator','organizator_id','id');
    }

    public function scopeSearch($query,$s){
        return $query->where('date','like','%'.$s.'%')->orWhere('organizator_id','like','%'.$s.'%')->orWhere('sportstype_id','like','%'.$s.'%');
    }
}
