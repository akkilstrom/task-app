<?php

namespace App;

class Client extends Model {
    
    public function projects() {
        return $this->hasMany(Project::class);
    }
}
