<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    // Eager Loading
    public function User(){
        return $this->belongsTo(User::class);
    }
}
