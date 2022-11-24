<?php

namespace App\Services\ChildUser\Student;

use App\Repositories\Eloquent\ChildUser\StudentRepository;

class CreateStudentService
{
    protected $studentRepository;
    /**
     * @param StudentRepository $studentRepository
     */
    public function __construct(StudentRepository $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }
    /**
     * @param mixed $request
     *
     * @return [type]
     */
    public function create($request)
    {
        return $this->studentRepository->create($request->all());
    }
}
