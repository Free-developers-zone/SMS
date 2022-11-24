<?php

namespace App\Services\ChildUser\Teacher;

use App\Repository\Eloquent\ChildUser\TeacherRepository;

class CreateTeacherService
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
