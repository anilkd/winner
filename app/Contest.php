<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Gratification;

class Contest extends Model
{

    protected $fillable = ['name', 'grat_id', 'start_date', 'end_date', 'created_at', 'updated_at'];

    public function shows()
    {
        return $this->belongsToMany('App\Show', 'shows_contests')
            ->withPivot(['contest_id', 'show_id', 'winner_count'])->withTimestamps();
    }

    public function winners()
    {
        return $this->hasMany('App\ShowContestWinner');
    }


    public function gratification()
    {
        return Gratification::find($this->grat_id);
    }
}
