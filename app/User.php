<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Kyslik\ColumnSortable\Sortable;

class User extends Authenticatable
{

//    TYPES OF USERS:
//    0. MASTER
//    1. ADMIN
//    2. CLUSTER HEAD
//    3. CG LEADER

    use Sortable;

    public $timestamps = true;

    public $sortable = [
        'first_name', 'middle_name', 'last_name', 'username',
        'email', 'leader_id', 'cg_id', 'address',
        'cluster_area', 'gender', 'group_age', 'age',
        'birthday', 'head_cluster_area', 'contact',
        'journey', 'cldp', 'type', 'is_leader',
        'is_active', 'created_at', 'updated_at'
    ];

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'middle_name', 'last_name', 'username',
        'email', 'password', 'leader_id', 'cg_id', 'address',
        'cluster_area', 'gender', 'group_age', 'age',
        'birthday', 'head_cluster_area', 'contact',
        'journey', 'cldp', 'type', 'is_leader',
        'is_active', 'remember_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function clusterCareGroups() {
        return $this->hasMany('App\Group', "cluster_area", "head_cluster_area");
    }

    public function groups() {
        return $this->hasMany('App\Group', 'leader_id');
    }

    public function caregroup() {
        return $this->belongsTo('App\Group', 'cg_id');
    }

    public function leader() {
        return $this->belongsTo('App\User', 'leader_id');
    }

    public function members() {
        return $this->hasMany('App\User', 'leader_id');
    }
}
