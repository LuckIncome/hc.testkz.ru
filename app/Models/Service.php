<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Service extends Model
{
    use HasFactory, Translatable;

    protected $translatable = ['title','content'];

    protected $fillable = [
        'type_id',
        'title',
        'price',
        'content',
        'featured',
        'status',
        'sort_id',
    ];

    public function typeId()
    {
        return $this->belongsTo(ServiceType::class,'type_id','id');
    }
    public function serviceType()
    {
        return $this->typeId();
    }
}
