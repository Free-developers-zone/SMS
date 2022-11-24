<?php

namespace App\Services\ChildUser\Student;

use App\Repositories\Eloquent\ChildUser\StudentRepository;

class DeleteStudentService
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
     * @param int $id
     *
     * @return [type]
     */
    public function delete(int $id)
    {
        $this->studentRepository->deleteById($id);
    }
}
