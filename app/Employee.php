<?php

namespace App;

class Employee extends Model
{
    //instead of public static function isVisible() use queryscopes
    //public function scopeIsVisible( $query ) {
        
        // return static::where('visible', 1)->get();
        //return $query->where('visible', 1);
    //}
}
