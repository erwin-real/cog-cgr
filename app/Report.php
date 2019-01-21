<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'date_cg', 'cluster_area', 'address',
        'consolidation_report', 'c2s_leader',
        'topic', 'offering', 'present',
        'absent', 'type', 'comment'
    ];

    // Table Name
    protected $table = 'reports';

    // Primary Key
    public $primaryKey = 'id';

    // Timestamps
    public $timestamps = true;

    public function leader() {
        return $this->belongsTo('App\User');
    }
}
