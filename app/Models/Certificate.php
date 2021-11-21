<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Resizable;

class Certificate extends Model
{
    use HasFactory, Resizable;

    public function getWebpImage($image)
    {
       return str_replace('.' . pathinfo(\Voyager::image($image),PATHINFO_EXTENSION), '.webp', \Voyager::image($image));
    }

    public function getWebpThumb($image)
    {
        return str_replace('.' . pathinfo(\Voyager::image($this->getThumbnail($image,'small')),PATHINFO_EXTENSION), '.webp', \Voyager::image($this->getThumbnail($image,'small')));
    }
}
