<?php

namespace App\Models\Backend;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class textBlocks
 * @package App\Models\Backend
 * @version May 11, 2018, 9:03 am UTC
 *
 * @property string name
 * @property string text
 * @property string link
 * @property string url
 * @property string label
 */
class textBlocks extends Model
{
    use SoftDeletes;

    public $table = 'text_blocks';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'text',
        'link',
        'url',
        'label'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'text' => 'string',
        'link' => 'string',
        'url' => 'string',
        'label' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public static function render($name)
    {
        $block = self::where('name', $name)->first();
        
        return $block;
    }

}
