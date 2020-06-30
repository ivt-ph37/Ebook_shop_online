<?php

namespace App\Http\Controllers\Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{


    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','register','logout','me','refresh']]);
    }

    /**
     * Get a JWT token via given credentials.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');


        if ($token = $this->guard()->attempt($credentials)) {
            return $this->respondWithToken($token);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    /**
     * Get the authenticated User
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        $user = auth()->user();
        if ($user) {
            return response()->json([
                'status' => 400,
                'message' => 'You must login before logout',
                'data' => $this->guard()->user()],400
            );
        }
        return response()->json([
            'status' => 400,
            'message' => 'You must login before logout',
            'data' => ''
        ],400);
    }

    /**
     * Log the user out (Invalidate the token)
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        $user = auth()->user();
        if ($user) {
            $this->guard()->logout();
            return response()->json(['message' => 'Successfully logged out'],200    );
        }

        return response()->json([
            'status' => 400,
            'message' => 'You must login before logout',
            'data' => ''
        ],400);
    }

    public function register(Request $request){

        try {
            $user = User::create([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'phone_number' => $request->get('phone_number'),
                'address' => $request->get('address'),
                'address_id' => $request->get('address_id'),
                'password' => Hash::make($request->get('password')),
            ]);
            $user->roles()->attach([3]);
            return response()->json([
                'status' => 200,
                'message' => 'User created successfully',
                'data' => $user
            ],200);
        }catch (\Exception $ex){
            return response()->json([
                'status' => 400,
                'message' => 'Not Ok',
                'data' => ''
            ],400);
        }

    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    { $user = auth()->user();
        if ($user) {
            return $this->respondWithToken($this->guard()->refresh());
        }
        return response()->json([
            'status' => 400,
            'message' => 'You must login to refresh',
            'data' => ''
        ],400);

    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        $user = auth()->user();
        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'phone_number' => $user->phone_number,
            'address' => $user->address,
            'address_id' => $user->address_id,
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->guard()->factory()->getTTL() * 60 * 24,
            'role' => $user->roles->pluck('name'),

        ]);
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\Guard
     */
    public function guard()
    {
        return Auth::guard();
    }
}
