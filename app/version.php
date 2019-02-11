<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class version extends Model
{
    protected $table = 'versions';

    public $hidden = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];
}
