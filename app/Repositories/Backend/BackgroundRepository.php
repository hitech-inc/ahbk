<?php

namespace App\Repositories\Backend;

use App\Models\Backend\Background;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class BackgroundRepository
 * @package App\Repositories\Backend
 * @version May 10, 2018, 10:48 am UTC
 *
 * @method Background findWithoutFail($id, $columns = ['*'])
 * @method Background find($id, $columns = ['*'])
 * @method Background first($columns = ['*'])
*/
class BackgroundRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'url',
        'img'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Background::class;
    }
}
