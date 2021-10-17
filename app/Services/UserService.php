<?php

namespace App\Services;

use App\Http\Requests\CheckUser;
use App\Http\Requests\StoreUser;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Prewk\Result\Ok;

class UserService
{
    /**
     * @param StoreUser $request
     * @return \Illuminate\Http\JsonResponse|Ok|string
     */
    public function signUpUser($request) {

            $user = new User();

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;

            $user->save();

            return new Ok($user);
    }

    /**
     * @param CheckUser $request
     */
    public function checkingWithEmail($request)
    {
        $user = DB::table('users')
            ->where('email', '=', $request->email)
            ->get('password');

//        echo($user->toArray());
        return $user;
    }
}
