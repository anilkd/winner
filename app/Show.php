<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    protected $fillable = ['show_name', 'show_start_time', 'show_end_time','created_at', 'updated_at'];

    public function contests()
    {
        return $this->belongsToMany('App\Contest','shows_contests')
            ->withPivot(['contest_id', 'show_id','winner_count'])->withTimestamps();
    }


    public function winners()
    {
        return $this->hasMany('App\ShowContestWinner');
    }

}
