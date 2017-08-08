<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gratification extends Model
{
    protected $fillable = ['grat_name', 'grat_value', 'quantity', 'expire_date', 'created_at', 'updated_at'];
}
