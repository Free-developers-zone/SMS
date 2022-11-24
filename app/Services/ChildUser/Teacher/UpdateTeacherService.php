<?php

namespace App\Services\ChildUser\Teacher;

use App\Repositories\Eloquent\ChildUser\TeacherRepository;

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
    /**
     * @param mixed $request
     * @param int $id
     *
     * @return [type]
     */
    public function update($request, int $id)
    {
        $this->teacherRepository->update($id, $request->all());
    }
    /**
     * @param mixed $request
     * @param int $id
     *
     * @return [type]
     */
    public function updateInfo($request, int $id)
    {
        $teacher = $this->teacherRepository->findById($id);
        $teacher->setMeta($request->all());
        $teacher->save();
    }
    /**
     * @param mixed $request
     * @param int $id
     *
     * @return [type]
     */
    public function updateOther($request, int $id)
    {
        $teacher = $this->teacherRepository->findById($id);
        $teacher->setMeta($request->all());
        $teacher->save();
    }
}
