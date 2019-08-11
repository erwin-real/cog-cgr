<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Group extends Model
{

    use Sortable;

    public $timestamps = true;

    public $sortable = [
        'leader_id', 'day_cg', 'time_cg', 'cluster_area',
        'venue', 'updated_at', 'created_at'
    ];

    protected $fillable = [
        'leader_id', 'day_cg', 'time_cg', 'cluster_area', 'venue'
    ];

    public function leader() { return $this->belongsTo('App\User', 'leader_id'); }

    public function members() { return $this->hasMany('App\User', 'cg_id'); }

    public function clusterHead() { return $this->hasOne('App\User', 'head_cluster_area', 'cluster_area'); }

    public function activeMembers() { return $this->hasMany('App\User', 'cg_id')->where('is_active', 1); }
}
