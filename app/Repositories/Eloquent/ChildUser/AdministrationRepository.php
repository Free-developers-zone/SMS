<?php

namespace App\Repositories\Eloquent\ChildUser;

use App\Models\ChildUser\Administration;
use App\Models\ChildUser\Student;
use App\Repositories\Interfaces\ChildUser\AdministrationInterface;
use App\Repositories\Interfaces\ChildUser\StudentInterface;
use App\Repositories\Base\BaseRepository;

class AdministrationRepository extends BaseRepository implements AdministrationInterface
{
    protected $model;
    /**
     * @param Administration $administration
     */
    public function __construct(Administration $administration)
    {
        $this->model = $administration;
    }
}

