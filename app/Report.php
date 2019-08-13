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
        'consolidation_report', 'date_submitted', 'is_verified_ch', 'comment_ch',
        'date_verified_ch', 'is_verified_dh', 'comment_dh', 'date_verified_dh'
    ];

    protected $sortable = [
        'leader_id', 'cg_id', 'type', 'day_cg', 'time_cg', 'venue',
        'cluster_area', 'topic', 'offering', 'present', 'absent',
        'consolidation_report', 'date_submitted', 'is_verified_ch', 'comment_ch',
        'date_verified_ch', 'is_verified_dh', 'comment_dh', 'date_verified_dh'
    ];

}
