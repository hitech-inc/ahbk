<?php

namespace App\Models\Backend;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Gallery
 * @package App\Models\Backend
 * @version May 10, 2018, 9:09 am UTC
 *
 * @property string title
 * @property string text
 * @property string img
 */
class Gallery extends Model
{
    use SoftDeletes;

    public $table = 'galleries';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'text',
        'img',
        'small_img'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'text' => 'string',
        'img' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'img' => 'required'
    ];

    public static function getGallery()
    {
        $gallery = self::where('img', '!=', null)->first();
        return $gallery->img;
    }

    
}
