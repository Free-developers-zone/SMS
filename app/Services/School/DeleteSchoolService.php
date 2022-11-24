<?php

namespace App\Services\ChildUser\School;

use App\Repositories\Eloquent\ChildUser\SchoolRepository;

class DeleteSchoolService
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
    * @param mixed $id
    *
    * @return [type]
    */
   public function delete($id)
    {
       return $this->schoolRepository->deleteById($id);
    }
}
