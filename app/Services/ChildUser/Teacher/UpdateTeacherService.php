<?php

namespace App\Services\ChildUser\Teacher;

use App\Repository\Eloquent\ChildUser\TeacherRepository;

class UpdateTeacherService
{
    protected $teacherRepository;
    /**
     * @param TeacherRepository $teacherRepository
     */
    public function __construct(TeacherRepository $teacherRepository)
    {
        $this->teacherRepository = $teacherRepository;
    }
}
