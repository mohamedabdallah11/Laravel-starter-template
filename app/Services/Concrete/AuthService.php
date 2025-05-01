<?php
namespace App\Services\Concrete;
use App\Helpers\ApiResponse;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function login(array $credentials)
    {
        $user = User::where('email', $credentials['email'])->first();

        if (! $user || ! Hash::check($credentials['password'], hashedValue: $user->password)) {
            return ApiResponse::sendResponse(
                401,
                'Invalid credentials'
                ,[]
            );
        }
        $user->tokens()->delete();
        $data=new UserResource($user);
        $data['token']=$user->createToken('authToken')->plainTextToken;

        return ApiResponse::sendResponse(200, 'User Logged In successfully', $data);        

    }

    public function register(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'birth_date' => $data['birthdate'],
            'password' => bcrypt($data['password']),
            'role' => $data['role'] , 
            'gender' => $data['gender']
        ]);

        $data=new UserResource($user);
        $data['token']=$user->createToken('auth_token')->plainTextToken;
        return ApiResponse::sendResponse(201, 'User created successfully', data: $data);

    }

    public function logout($user)
    {
        $user->currentAccessToken()->delete();
        return ApiResponse::sendResponse(200, 'User logged out successfully', []);
    }
}