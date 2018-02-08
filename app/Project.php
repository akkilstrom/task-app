<?php

namespace App;

class Project extends Model
{
    //Returns user that belongs to project
    public function user() {
        return $this->belongsTo(User::class);
    }

    //Returns client that belongs to project
    public function client() {
        return $this->belongsTo(Client::class);
    }

    //Function that adds task and binds it to the project and it's related user
    public function addTask($body, $user_id) {
        $this->comments()->create(compact('body', 'user_id'));
    }

    //Returns tasks that belongs to project - A project can have many tasks
    public function tasks() {
        return $this->hasMany(Task::class);
    }

}
