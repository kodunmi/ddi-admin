<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['title', 'description', 'image', 'date' , 'opening', 'closing', 'feature','location'];
}
