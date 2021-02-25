<?php

namespace App;
use Str;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    // Eager Loading
    public function User(){
        return $this->belongsTo(User::class);
    }

    // mutator

    public function setTitleAttribute($value){
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    


    public function getUrl(){
        return url("entries/$this->slug-$this->id");
    }
}
