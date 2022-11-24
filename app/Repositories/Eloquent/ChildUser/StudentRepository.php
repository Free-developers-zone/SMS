<?php

namespace App\Repository\Eloquent\ChildUser;

use App\Models\ChildUser\Student;
use App\Repositories\Interfaces\ChildUser\StudentInterface;
use App\Repository\Base\BaseRepository;

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

