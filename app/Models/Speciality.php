<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Speciality extends BaseModel
{
    use HasFactory, Translatable;

    protected $translatable = ['title','alternate'];

    public function doctors()
    {
        return $this->belongsToMany(Doctor::class)->where('status',true)->orderBy('sort_id');
    }
}
