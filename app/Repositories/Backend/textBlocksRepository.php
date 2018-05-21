<?php

namespace App\Repositories\Backend;

use App\Models\Backend\textBlocks;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class textBlocksRepository
 * @package App\Repositories\Backend
 * @version May 11, 2018, 9:03 am UTC
 *
 * @method textBlocks findWithoutFail($id, $columns = ['*'])
 * @method textBlocks find($id, $columns = ['*'])
 * @method textBlocks first($columns = ['*'])
*/
class textBlocksRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'text',
        'link',
        'url',
        'label'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return textBlocks::class;
    }
}
