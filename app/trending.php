<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class trending extends Model
{
    protected $table = 'trendings';

    public $hidden = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'filename'
    ];

    public function getFileNameAttribute($value)
    {
        return Storage::url('/trending/') . $value;
    }

}
