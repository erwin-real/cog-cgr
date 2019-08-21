<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Report extends Model
{
    use SoftDeletes;
    use Sortable;

    public $timestamps = true;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'leader_id', 'cg_id', 'type', 'day_cg', 'time_cg', 'venue',
        'cluster_area', 'topic', 'offering', 'present', 'absent',
        'consolidation_report', 'date_submitted', 'comment_ch',
        'date_verified_ch', 'comment_dh', 'date_verified_dh', 'department'
    ];

    protected $sortable = [
        'leader_id', 'cg_id', 'type', 'day_cg', 'time_cg', 'venue',
        'cluster_area', 'topic', 'offering', 'present', 'absent',
        'consolidation_report', 'date_submitted', 'comment_ch',
        'date_verified_ch', 'comment_dh', 'date_verified_dh', 'department'
    ];

    public function group() { return $this->belongsTo('App\Group', 'cg_id'); }

    public function leader() { return $this->belongsTo('App\User', 'leader_id'); }

    public function clusterHead() { return $this->hasOne('App\User', 'head_cluster_area', 'cluster_area'); }

    public function departmentHead() { return $this->hasOne('App\User', 'head_department', 'department'); }

//    public function present() { return $this->belongsTo('App\User', 'leader_id'); }

}
