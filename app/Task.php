<?php

namespace App;
use Carbon\Carbon;
use App\Comment;
use App\Tag;

class Task extends Model {

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function project() {
        return $this->belongsTo(Project::class);
    }

    public function addComment($body, $user_id) {
        $this->comments()->create(compact('body', 'user_id'));
    }

    // When this method is called we give it a list of filters
    public function scopeFilter($query, $filters) {
        
        // if there is a month in that filter query the months requested?
        if( $month = $filters['month'] ) {
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }
        // if there is a years in that filter query the years requested?
        if( $year = $filters['year'] ) {
            $query->whereYear('created_at', Carbon::parse($year)->year);
        }
    }

    public static function archives() {
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();
    }

    // Method that sets up a many to many relationship
    // 1 task may have many tags
    // Any tag may be applied to many posts
    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    protected $casts = [
        'project_id' => 'integer',
    ];
}
