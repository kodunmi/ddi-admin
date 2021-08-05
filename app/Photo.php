<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['text','public_id','feature','secure_url'];

    public function meeting()
    {
        return $this->belongsTo(Meeting::class);
    }

}
