<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    protected $fillable = ['question', 'feature'];


    public function options()
    {
        return $this->hasMany(Option::class);
    }

}
