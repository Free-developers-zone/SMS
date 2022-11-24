<?php

namespace App\Services\User;


use App\Mail\UserWelcome;
use App\Models\User;
use App\Repositories\Eloquent\User\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;


class CreateUserService
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
     * @param Mixed $request
     *
     * @return User
     */
    public function store(Mixed $request): User
    {
        $randomPassword = str()->random(10);
        $data = $request->all();
        $data['password'] = Hash::make($randomPassword);
        $user = $this->userRepository->create($data);
        $this->storeMeta($user, $request);
        Mail::to($request)->send(new UserWelcome($data, $randomPassword));
        return $user;
    }

    /**
     * Method uploadImage
     *
     * @param Mixed $request [image object in the request]
     *
     * @return string
     */
    protected function uploadImage(Mixed $request): Mixed
    {
        if ($request->has('avatar')) {
            return $request->avatar->store('user/avatar', 's3');
        } else {
            return null;
        }
    }
    /**
     * Method storeMeta
     *
     * @param User $user [User Object]
     * @param Mixed $request [Current request]
     *
     * @return void
     */
    protected function storeMeta(User $user, Mixed $request)
    {
        $userMeta['country'] = $request->country;
        //save user avatar
        if ($avatar = $this->uploadImage($request)) {
            $userMeta['avatar'] = $avatar;
        }
        $user->setMeta($userMeta);
        $user->save();
    }
}
      // public function updateMeta(User $user, array $data)
    // {
    //     $user->setMeta([
    //         'country' => $data('country'),
    //         'avatar' => $data('avatar'),
    //     ]);
    //     $user->save();
    // }
