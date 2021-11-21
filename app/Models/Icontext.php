<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Icontext extends BaseModel
{
    use HasFactory, Translatable;

    protected $translatable = ['title','text'];
}
