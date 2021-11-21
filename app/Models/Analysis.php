<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Analysis extends Model
{
    use HasFactory, Translatable;
    protected $translatable = ['title','content'];
    protected $table = 'analyzes';

    protected $primaryKey = 'id';

    protected $fillable = [
        'research_id',
        'title',
        'price',
        'content',
        'featured',
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

    public function researchId()
    {
        return $this->belongsTo(Research::class,'research_id','id');
    }
    public function research()
    {
        return $this->researchId();
    }
}
