<?php

namespace App\Services\ChildUser\School;

use App\Repositories\Eloquent\ChildUser\SchoolRepository;

class updateSchoolService
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
    * @param mixed $id
    *
    * @return [type]
    */
   public function update($request, $id)
    {
       return $this->schoolRepository->update( $id, $request->all());
    }
}
