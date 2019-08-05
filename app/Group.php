<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    // Timestamps
    public $timestamps = true;

    protected $fillable = [
        'leader_id', 'date_cg', 'time_cg', 'cluster_area', 'venue'
    ];

    public function leader() { return $this->belongsTo('App\User', 'leader_id'); }
}
