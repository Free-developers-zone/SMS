<?php

namespace App\Services\ChildUser\Teacher;

use App\Repositories\Eloquent\ChildUser\TeacherRepository;

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
    /**
     * @param mixed $request
     *
     * @return [type]
     */
    public function create($request)
    {
       return $this->teacherRepository->create($request->all());
    }
}
