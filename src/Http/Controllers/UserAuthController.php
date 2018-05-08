<?php

namespace Frontiernxt\LaravelRESTApi\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Auth\RegistersUsers;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        //need to find a way to check that this can be selectively applied. For instance, store may need app ID, but it does not bearer.
        //$this->middleware(['auth.check.app.id', 'auth.check.jwt.token'], ['except' => ['store']]);
    }
    public function login(Request $request)
    {
        
		$data = json_decode($request->getContent(), true);

		$email = $data['email'];

		$password = $data['password'];

        $rules = array('email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6');

        $validator = Validator::make($data, $rules);

        if ($validator->passes()) {
            //TODO Handle your data

            if (Auth::attempt(['email' => $email, 'password' => $password])) {
            // Authentication passed...
            	//return redirect()->intended('dashboard');

            	$user = Auth::getUser();

            	$token = JWTAuth::fromUser($user);
                
                $user->token = $token;
                
                return $user;


        	}

            if ($user && $user instanceof User)
            {
                $token = JWTAuth::fromUser($user);
                $user->token = $token;
                return $user;
            }

            

        } else {


        }
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        $rules = array('name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6');

        $validator = Validator::make($data, $rules);
        
        if ($validator->passes()) {
            //TODO Handle your data

            $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            ]);

            if ($user && $user instanceof User)
            {
                $token = JWTAuth::fromUser($user);
                $user->token = $token;
                return $user;
            }

            

        } else {
            //TODO Handle your error
            //return $validator->errors()->all();
            return response()->json(array('error'=> $validator->errors()->all()), 400);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
