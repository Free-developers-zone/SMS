<?php

namespace App\Repository\Eloquent\User;

use App\Models\User\User;
use App\Models\User\UserSecondary;
use App\Repositories\Interfaces\User\UserSecondaryRepositoryInterface;
use App\Repositories\Base\BaseRepository;

class UserSecondaryRepository extends BaseRepository implements UserSecondaryRepositoryInterface
{
    protected $model;
    /**
     * @param UserSecondary $secondary
     */
    public function __construct(UserSecondary $secondary)
    {
        $this->model = $secondary;
    }
}

