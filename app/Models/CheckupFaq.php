<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class CheckupFaq extends Model
{
    use HasFactory, Translatable;

    protected $translatable = ['title','content'];

    public function checkupType()
    {
        return $this->belongsTo(CheckupType::class,'type_id','id')->where('status',true);
    }
}
