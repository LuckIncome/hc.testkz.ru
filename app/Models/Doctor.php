<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Resizable;
use TCG\Voyager\Traits\Translatable;

class Doctor extends BaseModel
{
    use HasFactory, Translatable, Resizable;

    protected $translatable = ['name','spec','content','seo_title','meta_keywords','meta_description'];

    public function specialities()
    {
        return $this->belongsToMany(Speciality::class)->where('status',true)->orderBy('sort_id');
    }
}
