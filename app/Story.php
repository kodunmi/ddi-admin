<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    protected $fillable = ['title','secure_url','public_id','summary','description','feature'];
}
