<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class CheckupType extends Model
{
    use HasFactory, Translatable;

    protected $translatable = ['title','subtitle','description','content_1','content_2'];

    public function checkups()
    {
        return $this->hasMany(Checkup::class,'type_id','id')->where('status',true)->orderBy('sort_id');
    }

    public function checkupFaqs()
    {
        return $this->hasMany(CheckupFaq::class,'type_id')->where('status',true)->orderBy('sort_id');
    }

}
