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

//            $user = new User();
//
//            $user->name = $request->name;
//            $user->email = $request->email;
//            $user->password = $request->password;
//
//            $user->save();

        /*we can use Mass Assignment instead of above steps.
                              This one is best practice for save MODEL.*/
            $create = User::create($request->all());

            return new Ok($create);
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
