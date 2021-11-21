<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Checkup extends Model
{
    use HasFactory, Translatable;

    protected $translatable = ['title', 'content_1','content_2'];

    public $additional_attributes = ['full_name'];


    public function checkupPrices()
    {
        return $this->hasMany(CheckupPrice::class,'type_id')->where('status',true)->orderBy('sort_id');
    }

    public function checkupType()
    {
        return $this->belongsTo(CheckupType::class,'type_id','id')->where('status',true);
    }

    public function getFullNameAttribute()
    {
        return "{$this->title} ({$this->checkupType->title})";
    }
}
