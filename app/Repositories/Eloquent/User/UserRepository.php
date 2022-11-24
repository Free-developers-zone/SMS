<?php

namespace App\Repository\Eloquent\User;

use App\Models\User\User;
use App\Repositories\Interfaces\User\UserRepositoryInterface;
use App\Repository\Base\BaseRepository;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    protected $model;
    /**
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->model = $user;
    }
}

