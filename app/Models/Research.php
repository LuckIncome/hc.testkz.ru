<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Research extends Model
{
    use HasFactory, Translatable;

    protected $translatable = ['title','seo_title','meta_keywords','meta_description'];

    protected $table = 'researches';

    protected $fillable = [
        'title',
        'slug',
        'seo_title',
        'meta_keywords',
        'meta_description',
        'status',
        'sort_id',
    ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function analyzes()
    {
        return $this->hasMany(Analysis::class);
    }

    public function limitAnalyzes()
    {
        return $this->hasMany(Analysis::class)->limit(12);
    }
}
