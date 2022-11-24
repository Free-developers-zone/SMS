<?php

namespace App\Repositories\Eloquent\ChildUser;

use App\Models\ChildUser\Teacher;
use App\Repositories\Interfaces\ChildUser\TeacherInterface;
use App\Repositories\Base\BaseRepository;

class TeacherRepository extends BaseRepository implements TeacherInterface
{
    protected $model;
    /**
     * @param Teacher $teacher
     */
    public function __construct(Teacher $teacher)
    {
        $this->model = $teacher;
    }
}

