<?php

namespace App\Services\ChildUser\Student;

use App\Repository\Eloquent\ChildUser\StudentRepository;

class UpdateStudentService
{
    protected $studentRepository;
    /**
     * @param StudentRepository $studentRepository
     */
    public function __construct(StudentRepository $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }
}
