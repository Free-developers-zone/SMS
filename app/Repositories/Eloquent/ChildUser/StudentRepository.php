<?php

namespace App\Repositories\Eloquent\ChildUser;

use App\Models\ChildUser\Student;
use App\Repositories\Interfaces\ChildUser\StudentInterface;
use App\Repositories\Base\BaseRepository;

class StudentRepository extends BaseRepository implements StudentInterface
{
    protected $model;
    /**
     * @param Student $student
     */
    public function __construct(Student $student)
    {
        $this->model = $student;
    }
}

