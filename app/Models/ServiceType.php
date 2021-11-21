<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class ServiceType extends Model
{
    use HasFactory, Translatable;

    protected $translatable = ['title','seo_title','meta_keywords','meta_description'];

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

    public function services()
    {
        return $this->hasMany(Service::class,'type_id');
    }


    public function limitServices()
    {
        return $this->hasMany(Service::class,'type_id','id')->take(12);
    }

    public function featuredServices()
    {
        return $this->services()->orderByDesc('featured')->limit(9);
    }
}
