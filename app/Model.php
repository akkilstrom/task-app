<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

// Parent class that all of the other models extends.
class Model extends Eloquent
{   
    // Guards what will be allowed or not
    protected $guarded = [];
}