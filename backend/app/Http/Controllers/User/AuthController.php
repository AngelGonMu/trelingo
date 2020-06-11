<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

/**
 * @group Authentication
 */
class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    /**
     * Login & get token
     *
     * @bodyParam email string required User email address. Example: trelingo@trelingo.com
     * @bodyParam password string required User password. Example: xXxXxXxXx
     *
     * @response {"access_token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU5MDMzMjk0MCwiZXhwIjoxNTkwMzM2NTQwLCJuYmYiOjE1OTAzMzI5NDAsImp0aSI6InEzVGlNTWxiYlprNGVhWlIiLCJzdWIiOjEsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.0CsugnkKWmH6PDRrYswCRkRM-f5eLftHBN_2IR0tZMc","token_type":"bearer","expires_in":3600,"user":{"id":1,"name":"John","surname":"Doe","email":"trelingo@trelingo.com","email_verified_at":null,"role":"Admin","environment":"test","account_id":1,"created_at":"2020-05-10T18:37:04.000000Z","updated_at":"2020-05-10T18:37:04.000000Z"}}
     *
     * @response 401 {
     *  "error": "Non authorized"
     * }
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Non authorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Logout & invalidate token
     *
     * @authenticated
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh token
     *
     * @authenticated
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Update user
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $current = Auth::user();
        $user = User::find($id);

        if($current->account_id===$user->account_id){
            $user->update([
                "name"=>$request->name,
                "surname"=>$request->surname,
                "email"=>$request->email,
                "environment"=>$request->environment
            ]);
            if($request->password!=""){
                $user->update([
                    "password"=>bcrypt($request->password)
                ]);
            }
            return response()->json(['success' => 'User updated'],200);
        }

        return response()->json(['error' => 'Unauthorized'],401);
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
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user'=>auth()->user()
        ]);
    }
}
