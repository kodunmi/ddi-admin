<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable =[
        'public_id',
        'secure_url'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
