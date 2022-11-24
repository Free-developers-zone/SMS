<?php

namespace App\Http\Controllers\UserRole;

use App\Http\Controllers\Controller;
use App\Models\User\UserRole;
use App\Repositories\Eloquent\User\UserRoleRepository;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    protected $userRoleRepository;
    /**
     * @param UserRoleRepository $userRoleRepository
     */
    public function __construct(UserRoleRepository $userRoleRepository)
    {
        $this->userRoleRepository = $userRoleRepository;
    }
    public function getRole()
    {
        return response()->json([
            'roles' => $this->userRoleRepository->getByColumn(['status' => UserRole::STATUS['ACTIVE']]),
        ],200);
    }
    /**
     * @param Request $request
     *
     * @return [type]
     */
    public function createRole(Request $request)
    {
        $role = $this->userRoleRepository->create($request->all());
        return response()->json([
            'message' => 'Role created successfully',
            'role' => $role,
        ],201);
    }
    /**
     * @param Request $request
     * @param int $id
     *
     * @return [type]
     */
    public function updateRole(Request $request, int $id)
    {
        $role = $this->userRoleRepository->update( $id, $request->all());
        return response()->json([
            'message' => 'Role updated successfully',
            'role' => $role,
        ],200);
    }
    /**
     * @param int $id
     *
     * @return [type]
     */
    public function deleteRole(int $id)
    {
        $this->userRoleRepository->deleteById($id);
        return response()->json([
            'message' => 'Role deleted successfully',
        ],200);
    }
}
