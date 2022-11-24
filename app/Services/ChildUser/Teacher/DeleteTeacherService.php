<?php

namespace App\Services\ChildUser\Teacher;

use App\Repositories\Eloquent\ChildUser\TeacherRepository;

class DeleteTeacherService
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
     * @param int $id
     *
     * @return [type]
     */
    public function delete(int $id)
    {
        $this->teacherRepository->deleteById($id);
    }
}
