<?php

namespace App\Services\ChildUser\Administration;

use App\Models\ChildUser\Administration;
use App\Repository\Eloquent\ChildUser\StudentRepository;

class UpdateAdministrationService
{
    protected $administrationRepository;
    /**
     * @param Administration $administrationRepository
     */
    public function __construct(Administration $administrationRepository)
    {
        $this->administrationRepository = $administrationRepository;
    }
}
