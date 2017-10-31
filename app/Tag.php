<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function cards() {
        return $this->belongsToMany(Card::class);
    }

    //this function binds the id to the tag name
    public function getRouteKeyName() {
        return 'name';
    }
}
