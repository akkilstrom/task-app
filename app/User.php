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

    public function tasks() {
        return $this->hasMany(Task::class);
    }

    // Saves the task
    public function publish(Task $task) {
        $this->tasks()->save($task);
    }

    //Add project to the user
    public function addProject(Project $project) {
        $this->tasks()->save($project);
    }
    // The user an have many projects
    public function projects() {
        return $this->hasMany(Project::class);
    }
}
