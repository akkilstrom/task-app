<?php

namespace App;

class Project extends Model
{
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function client() {
        return $this->belongsTo(Client::class);
    }

}
