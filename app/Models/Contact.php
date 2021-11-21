<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Contact extends BaseModel
{
    use Translatable;

    protected $translatable = ['value'];

    public function getWebpImageAttribute()
    {
        return str_replace('.' . pathinfo(\Voyager::image($this->image),PATHINFO_EXTENSION), '.webp', \Voyager::image($this->image));
    }
}
