<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Resizable;
use TCG\Voyager\Traits\Translatable;

class Slider extends BaseModel
{
    use HasFactory, Translatable, Resizable;

    protected $translatable = ['title','subtitle','text','btn_text'];
}
