<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{

    public function count()
    {
        return $this->hasOne(Count::class);
    }

    protected $fillable = ['name', 'doc', 'image', 'feature', 'description'];
}
