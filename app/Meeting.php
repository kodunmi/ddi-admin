<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    protected $fillable = ['description','name','tool_id','image'];

    public function tool()
    {
        return $this->belongsTo(Tool::class);
    }


    public function photos()
    {
        return $this->hasMany(Photo::class)->where('feature', true);
    }

    public function adminPhotos()
    {
        return $this->hasMany(Photo::class);
    }

}
