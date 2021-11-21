<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class CheckupPrice extends Model
{
    use HasFactory, Translatable;

    protected $translatable = ['title'];

    public function checkup()
    {
        return $this->belongsTo(Checkup::class,'type_id','id')->where('status',true);
    }
}
