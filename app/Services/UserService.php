<?php

namespace App\Services;

use App\Http\Requests\StoreUser;
use App\Models\User;
use Prewk\Result\Ok;

class UserService
{
    /**
     * @param StoreUser $request
     * @return Ok
     */
    public function signUpUser($request) {
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();

        return new Ok($user);
    }
}
