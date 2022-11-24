<?php

namespace App\Repositories\Eloquent\User;

use App\Models\User\UserRole;
use App\Repositories\Interfaces\User\UserRoleRepositoryInterface;
use App\Repositories\Base\BaseRepository;

class UserRoleRepository extends BaseRepository implements UserRoleRepositoryInterface
{
    protected $model;
    /**
     * @param UserRole $userRole
     */
    public function __construct(UserRole $userRole)
    {
        $this->model = $userRole;
    }
}
