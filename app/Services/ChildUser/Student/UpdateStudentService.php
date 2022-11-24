<?php

namespace App\Services\ChildUser\Student;

use App\Repositories\Eloquent\ChildUser\StudentRepository;

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
    /**
     * @param mixed $request
     * @param int $id
     *
     * @return [type]
     */
    public function update($request, int $id)
    {
        $this->studentRepository->update($id, $request->all());
    }
    /**
     * @param mixed $request
     * @param int $id
     *
     * @return [type]
     */
    public function updateInfo($request, int $id)
    {
       $student = $this->studentRepository->findById($id);
       $student->setMeta($request->all());
       $student->save();
    }
    public function updateGuardian($request, int $id)
    {
        $student = $this->studentRepository->findById($id);
        $student->setMeta($request->all());
        $student->save();
    }

}
