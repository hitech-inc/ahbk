<?php

namespace App\Models\Backend;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Certificate
 * @package App\Models\Backend
 * @version May 11, 2018, 4:37 am UTC
 *
 * @property string title
 * @property string text
 * @property string img
 */
class Certificate extends Model
{
    use SoftDeletes;

    public $table = 'certificates';
    

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
        
    ];

    
}
