<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Tray_icon extends Model
{
    protected $table = 'tray_icons';

    public $hidden = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id', 'icon_name'
    ];


    public function category()
    {
        return $this->belongsTo('App\category');
    }

    public function getIconNameAttribute($value)
    {
        return Storage::url('/tray_icon/1x/') . $value;
    }
}
