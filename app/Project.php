<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable =[
        'name',
        'sponsor',
        'venue',
        'summary',
        'service',
        'description',
        'is_featured'
    ];

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
