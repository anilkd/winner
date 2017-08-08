<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Winner extends Model
{

    protected $fillable = ['show_id', 'rj_name', 'contest_id', 'winner_name', 'phone_no', 'area_name', 'gift_issued_date', 'email'];

    public function show()
    {
        return Show::find($this->show_id);
    }

    public function contest()
    {
        return Contest::find($this->contest_id);
    }
}
