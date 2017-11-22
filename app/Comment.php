<?php

namespace App;

class Comment extends Model {
    
    public function card() {
        return $this->belongsTo(Card::class);
    }

    public function task() {
        return $this->belongsTo(Task::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}


