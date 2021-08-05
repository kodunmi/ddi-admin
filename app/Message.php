<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['firstname', 'lastname', 'email', 'phone', 'message'];

    protected $dates = ['read_at'];

    public function unread(){
        return $this->where('read', false)->get();
    }

    public function getReadAttribute(){
        return $this->where('read', true )->get();
    }

    public function markAsRead(){
        $this->read_at = Carbon::now();
        $this->save();

        return $this;
    }
    public function markAsUnread(){
        $this->read = null;
        $this->save();

        return $this;
    }
}
