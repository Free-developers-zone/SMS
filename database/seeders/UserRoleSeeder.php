<?php

namespace Database\Seeders;

use App\Repositories\Eloquent\User\UserRoleRepository;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    protected $userRoleRepository;
    /**
     * @param UserRoleRepository $userRoleRepository
     */
    public function __construct(UserRoleRepository $userRoleRepository)
    {
        $this->userRoleRepository = $userRoleRepository;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $array = [
            [
                'role' => ' Super Admin'
            ], [
                'role' => 'Admin'
            ], [
                'role' => 'tech_user'
            ], [
                'role' => 'user'
            ]
        ];
        foreach ($array as $key => $item) {
            if (!$this->userRoleRepository->existsByColumn(['role' => $item['role']])) {
                $this->userRoleRepository->create($item);
            }
        }
    }
}
