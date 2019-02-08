<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table = 'categories';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category', 'title', 'publisher', 'publisher_website', 'privacy_policy_website', 'licence_agreement_website'
    ];

    public $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public function tray_icon()
    {
        return $this->hasOne(Tray_icon::class);
    }

    public function sticker()
    {
        return $this->hasMany(Sticker::class);
    }

}
