<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    protected $fillable = ['what_we_do','name','color','description','icon','feature'];

    public function meetings()
    {
        return $this->hasMany(Meeting::class);
    }
}
