<?php

namespace App\Repositories\Eloquent\ChildUser;

use App\Models\ChildUser\Teacher;
use App\Models\School;
use App\Repositories\Interfaces\ChildUser\TeacherInterface;
use App\Repositories\Base\BaseRepository;
use App\Repositories\Interfaces\School\SchoolInterface;

class SchoolRepository extends BaseRepository implements SchoolInterface
{
    protected $model;
    /**
     * @param School $school
     */
    public function __construct(School $school)
    {
        $this->model = $school;
    }
}

