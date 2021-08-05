<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $fillable = ['option', 'vote'];


    public function poll()
    {
        return $this->belongsTo(Poll::class);
    }

}
