<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimony extends Model
{
    public $fillable = ['public_id', 'secure_url', 'text', 'designation', 'name','feature'];
}
