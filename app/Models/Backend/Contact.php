<?php

namespace App\Models\Backend;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Contact
 * @package App\Models\Backend
 * @version May 10, 2018, 6:11 am UTC
 *
 * @property string longitude
 * @property string latitude
 * @property string address
 * @property string phone
 * @property string email
 */
class Contact extends Model
{
    use SoftDeletes;

    public $table = 'contacts';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'longitude',
        'latitude',
        'address',
        'phone',
        'email'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'longitude' => 'string',
        'latitude' => 'string',
        'address' => 'string',
        'phone' => 'string',
        'email' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public static function getCoords()
    {
        $maps = self::where('longitude', '!=', null)->get();
        $coords = [];
        foreach ($maps as $map)
        {
            $coords = [
                'longitude' => $map->longitude,
                'latitude' => $map->latitude
            ];
        }

        return $coords;
    }

    public static function getContacts()
    {
        $contacts = self::all();
        return $contacts;
    }
    
}
