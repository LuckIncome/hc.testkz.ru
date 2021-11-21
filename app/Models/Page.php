<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends \TCG\Voyager\Models\Page
{
    use HasFactory;

    protected $translatable = ['title', 'excerpt', 'body', 'meta_keywords', 'meta_description', 'seo_title'];
}
