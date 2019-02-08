<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Sticker extends Model
{
    protected $table = 'stickers';

    public $hidden = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id', 'sticker'
    ];


    public function category()
    {
        return $this->belongsTo('App\category');
    }

    public function getStickerAttribute($value)
    {
        return Storage::url('/sticker/1x/') . $value;
    }
}
