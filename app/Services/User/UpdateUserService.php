<?php

namespace App\Services\User;

use App\Http\Requests\User\UserContactInfoUpdateRequest;
use App\Http\Requests\User\UserCreateRequest;
use App\Http\Requests\User\UserOtherInfoUpdateRequest;
use App\Http\Requests\User\UserPrivacyUpdateRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Models\User;
use App\Repositories\Eloquent\User\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UpdateUserService
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
   * Method store
   *
   * @param UserCreateRequest $request [Create User request]
   *
   * @return User
   */
  public function store(UserUpdateRequest $request, int $id)
  {
    if ($this->userRepository->updateWithTrashed($id, $request->all())) {
      return response()->json([
        'message' => "User update successfully",
      ], 201);
    } else {
      return response()->json([
        'message' => "User not found",
      ], 404);
    }
  }



  /**
   * @param UserPrivacyUpdateRequest $request
   * @param string $slug
   * 
   * @return [type]
   */
  public function passwordchange(UserPrivacyUpdateRequest $request, int $id)
  {
    $data = $request->all();
    $data['password'] = Hash::make($data['password']);
    if ($this->userRepository->updateWithTrashed($id, $data)) {
      return response()->json([
        'message' => "User password change successfully",
      ], 201);
    } else {
      return response()->json([
        'message' => "User not found",
      ], 404);
    }
  }


  /**
   * @param UserOtherInfoUpdateRequest $request
   * @param string $slug
   * 
   * @return [type]
   */
  public function othermeta(UserOtherInfoUpdateRequest $request, int $id)
  {
    if ($user = $this->userRepository->findTrashedById($id)) {
      // $this->userRepository->updateWithTrashed($user->id, $request->all());
      // $userMeta = $request->all();
      // if ($avatar = $this->uploadImage($request)) {
      //   $userMeta['avatar'] = $avatar;
      // }
      // $user->setMeta($userMeta);
      // $user->update();

      $user->setMeta($request->all());
      if ($avatar = $this->uploadImage($request)) {
        $user['avatar'] = $avatar;
      }
      $user->save();
      return response()->json([
        'message' => "User other information update successfully",
      ], 201);
    } else {
      return response()->json([
        'message' => "User not found",
      ], 404);
    }
  }

  public function contactmeta(UserContactInfoUpdateRequest $request, int $id)
  {
    if ($user = $this->userRepository->findTrashedById($id)) {
      // $this->userRepository->updateWithTrashed($user->id, $request->all());
      $user->setMeta($request->all());
      $user->save();
      return response()->json([
        'message' => "User Contact information update successfully",
      ], 201);
    } else {
      return response()->json([
        'message' => "User not found",
      ], 404);
    }
  }


  protected function uploadImage($request)
  {
    if ($request->has('avatar')) {
      return $request->avatar->store('user/avatar', 's3');
    } else {
      return null;
    }
  }
  public function removeImage(int $id)
  {
    $user = $this->userRepository->findTrashedById($id);
    Storage::disk('s3')->delete('user/avatar');
    $user->setMeta(['avatar' => null]);
    $user->save();
  }
}
