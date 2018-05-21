<?php

namespace App\Models\Backend;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Background
 * @package App\Models\Backend
 * @version May 10, 2018, 10:48 am UTC
 *
 * @property string url
 * @property string img
 */
class Background extends Model
{
    use SoftDeletes;

    public $table = 'backgrounds';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'url',
        'img'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'url' => 'string',
        'img' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'url' => 'required'
    ];

    
}
