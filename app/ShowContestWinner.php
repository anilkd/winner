<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShowContestWinner extends Model
{
    protected $table = 'shows_contests_winners';

    protected $fillable = ['show_id', 'contest_id','winner_id'];

    public function show()
    {
        return $this->belongsTo('App\Show');
    }

    public function contest()
    {
        return $this->belongsTo('App\Contest');
    }
}
