<?php

namespace App\Repositories\Backend;

use App\Models\Backend\About;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AboutRepository
 * @package App\Repositories\Backend
 * @version May 10, 2018, 9:31 am UTC
 *
 * @method About findWithoutFail($id, $columns = ['*'])
 * @method About find($id, $columns = ['*'])
 * @method About first($columns = ['*'])
*/
class AboutRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'text',
        'img'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return About::class;
    }
}
