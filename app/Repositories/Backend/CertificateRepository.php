<?php

namespace App\Repositories\Backend;

use App\Models\Backend\Certificate;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CertificateRepository
 * @package App\Repositories\Backend
 * @version May 11, 2018, 4:37 am UTC
 *
 * @method Certificate findWithoutFail($id, $columns = ['*'])
 * @method Certificate find($id, $columns = ['*'])
 * @method Certificate first($columns = ['*'])
*/
class CertificateRepository extends BaseRepository
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
        return Certificate::class;
    }
}
