<?php

namespace App\Repositories;

use App\Models\TechnicalEquipment;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TechnicalEquipmentRepository
 * @package App\Repositories
 * @version May 10, 2018, 9:49 am UTC
 *
 * @method TechnicalEquipment findWithoutFail($id, $columns = ['*'])
 * @method TechnicalEquipment find($id, $columns = ['*'])
 * @method TechnicalEquipment first($columns = ['*'])
*/
class TechnicalEquipmentRepository extends BaseRepository
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
        return TechnicalEquipment::class;
    }
}
