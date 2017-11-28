<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Project;

class User extends Authenticatable {
    use Notifiable;

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    **/
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    **/
    protected $hidden = [
        'password', 'remember_token',
    ];

    // public function cards() {
    //     return $this->hasMany(Card::class);
    // }

    // public function publish(Card $card) {
    //     // This cards save the given card
    //     $this->cards()->save($card);
    // }

    public function tasks() {
        return $this->hasMany(Task::class);
    }

    public function publish(Task $task) {
        // This cards save the given card
        $this->tasks()->save($task);
    }

    public function addProject(Project $project) {
        // This cards save the given card
        $this->tasks()->save($project);
    }

    public function projects() {
        return $this->hasMany(Project::class);
    }
}
