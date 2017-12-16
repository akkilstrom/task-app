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

    public function addTask($body, $user_id) {
        $this->comments()->create(compact('body', 'user_id'));
    }

    public function tasks() {
        return $this->hasMany(Task::class);
    }

}
