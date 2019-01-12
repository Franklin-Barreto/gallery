<?php
namespace gallery\Http\Models;

use Illuminate\Database\Eloquent\Model;

class ImageGallery extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'title',
        'path',
        'download',
        'view'
    ];
}
