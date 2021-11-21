<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Resizable;
use TCG\Voyager\Traits\Translatable;

class Article extends BaseModel
{
    use HasFactory, Resizable, Translatable;

    protected $translatable = ['title','excerpt','body','seo_title','meta_description','meta_keywords'];

    /**
     * Get the route key for the model.
     *
     * @return string
     */

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
