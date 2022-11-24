<?php

namespace App\Services\ChildUser\School;

use App\Repositories\Eloquent\ChildUser\SchoolRepository;


class CreateSchoolService
{
    protected $schoolRepository;
    /**
     * @param SchoolRepository $schoolRepository
     */
    public function __construct(SchoolRepository $schoolRepository)
    {
        $this->schoolRepository = $schoolRepository;
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
