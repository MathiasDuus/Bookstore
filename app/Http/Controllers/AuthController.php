<?php
namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\customer;
use App\Models\employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function register(AuthRequest $request)
    {

        $request['password'] = password_hash($request['password'], PASSWORD_DEFAULT);
        $user = customer::create($request->toArray());
        $token = $user->createToken('Laravel Password Grant Client')->accessToken;
        $response = ['token' => $token];
        return response($response, 200);

    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors()->first()], 422);
        }

        $user = customer::where('email', $request->email)->first();
        $employee = employee::where('email', $request->email)->first();
        if ($user) {

            if (password_verify($request->password, $user->password)) {
                $token = $user->createToken('Laravel Password Grant Client')->accessToken;
                $response = ['token' => $token];
                return response($response, 200);

            } else {
                $response = ["error" => "Email or password is wrong"];
                return response($response, 422);
            }

        } elseif ($employee) {
            if (password_verify($request->password, $employee->password)) {
                $token = $employee->createToken('Laravel Password Grant Client')->accessToken;
                $response = ['token' => $token];
                return response($response, 200);
            } else {
                $response = ["error" => "Email or password is wrong"];
                return response($response, 422);
            }

        } else {

            $response = ["error" => 'User does not exist'];
            return response($response, 422);
        }
    }

    public function me(Request $request)
    {
        $user = $request->user();

        return response()->json(['user' => $user], 200);
    }

    public function logout (Request $request)
    {
        $token = $request->user()->token();
        $token->revoke();
        $response = ['message' => 'You have been successfully logged out!'];
        return response($response, 200);
    }
}
