<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    // Timestamps
    public $timestamps = true;

    protected $fillable = [
        'leader_id', 'day_cg', 'time_cg', 'cluster_area', 'venue'
    ];

    public function leader() { return $this->belongsTo('App\User', 'leader_id'); }

    public function members() { return $this->hasMany('App\User', 'cg_id'); }

    public function clusterHead() { return $this->hasOne('App\User', 'head_cluster_area', 'cluster_area'); }
}
