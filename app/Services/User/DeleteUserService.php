<?php

namespace App\Services\User;



use App\Repositories\Eloquent\User\UserRepository;



class DeleteUserService
{

    /**
     * The repository interface to use in this service.
     */
    protected $userRepository;

    /**
     * Method __construct
     *
     * @param  UserRepository  $userRepository [User repository]
     * @return void
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    /**
     * @param int $id
     * 
     * @return [type]
     */
    public function softDelete(int $id)
    {
        if ($this->userRepository->deleteById($id)) {
            return response()->json([
                'message' => "User temporally delete"
            ], 201);
        } else {
            return response()->json([
                'message' => "User not found"
            ], 404);
        }
    }

    public function restore(int $id)
    {
        if ($this->userRepository->restoreById($id)) {
            return response()->json([
                'message' => "User restore Successfully"
            ], 201);
        } else {
            return response()->json([
                'message' => "User not found"
            ], 404);
        }
    }

    public function hardDelete(int $id)
    {
        if ($this->userRepository->permanentlyDeleteById($id)) {
            return response()->json([
                'message' => "User permanently deleted Successfully"
            ], 201);
        } else {
            return response()->json([
                'message' => "User not found"
            ], 404);
        }
    }
}
