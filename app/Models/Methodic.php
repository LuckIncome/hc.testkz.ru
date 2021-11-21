<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Methodic extends BaseModel
{
    use HasFactory, Translatable;

    protected $translatable = ['title', 'excerpt', 'description', 'symptoms', 'program', 'symptom_title', 'program_title'];
}
