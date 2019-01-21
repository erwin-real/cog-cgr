<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CareGroup extends Model
{
    protected $fillable = [
        'date_cg', 'cluster_area', 'address'
    ];

    // Table Name
    protected $table = 'care_groups';

    // Primary Key
    public $primaryKey = 'id';

    // Timestamps
    public $timestamps = true;

    public function leader() {
        return $this->belongsTo('App\User');
    }
}
