<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckUser;
use App\Http\Requests\StoreUser;
use App\Models\User;
use App\Services\UserService;
use App\Transformers\UserTransformer;
use Illuminate\Http\Request;


class UserController extends Controller
{
    /**
     * The task repository instance.
     *
     * @var UserService
     */
    protected $userService;

    /**
     * Create a new controller instance.
     *
     * @param  UserService  $userService
     *
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     */
    public function store(StoreUser $request)
    {
        $result = $this->userService->signUpUser($request);
        return fractal($result->unwrap(), new UserTransformer)->respond(200);


    }

    /**
     * Display the specified resource.
     *
     *@param  \Illuminate\Http\Request  $request
     *
     */
    public function show(CheckUser $request)
    {
        $result = $this->userService->checkingWithEmail($request);


        if($result->isNotEmpty()) {

            if($result[0]->password == $request->get('password')) {
                $data = [
                    "massage" => "Password Correct",
                ];
                return response()->json($data);
            } else {
                $data = [
                    "massage" => "Password incorrect",
                ];
                return response()->json($data);
            }
        } else {
            $data = [
                "massage" => "Invalid user_name",
            ];
            return response()->json($data);
        }



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
