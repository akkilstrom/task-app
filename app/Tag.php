<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

class Tag extends Model {
    
    public function tasks() {
        return $this->belongsToMany(Task::class);
    }

    //this function binds the id to the tag name
    public function getRouteKeyName() {
        return 'name';
    }
}
