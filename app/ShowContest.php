<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShowContest extends Model
{
    protected $table = 'shows_contests';
    protected $primaryKey = ['show_id', 'contest_id'];
    public $incrementing = false;

    protected $guarded = [];
    protected $fillable = ['show_id', 'contest_id','winner_count'];

    /**
     * Set the keys for a save update query.
     * This is a fix for tables with composite keys
     * TODO: Investigate this later on
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function setKeysForSaveQuery(\Illuminate\Database\Eloquent\Builder $query) {
        if (is_array($this->primaryKey)) {
            foreach ($this->primaryKey as $pk) {
                $query->where($pk, '=', $this->original[$pk]);
            }
            return $query;
        }else{
            return parent::setKeysForSaveQuery($query);
        }
    }
}
