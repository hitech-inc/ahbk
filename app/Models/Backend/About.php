<?php

namespace App\Models\Backend;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class About
 * @package App\Models\Backend
 * @version May 10, 2018, 9:31 am UTC
 *
 * @property string title
 * @property string text
 * @property string img
 */
class About extends Model
{
    use SoftDeletes;

    public $table = 'abouts';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'text',
        'img'
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
        'title' => 'required',
        'text' => 'required',
    ];

    
}
