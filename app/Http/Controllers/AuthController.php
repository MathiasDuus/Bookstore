<?php
namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    /**
     * Register customer
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        // Checks the input
        $validator = Validator::make($request->all(), ['first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|string|email:rfc,dns|unique:customers|max:255',
            'password' => ['required', 'confirmed', Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()
            ]
        ]);

        // Returns a response
        if ($validator->fails()) {
            return response(['error' => $validator->errors()->first()], 422);
        }

        // Hashes the password with PHP's default
        $request['password'] = password_hash($request['password'], PASSWORD_DEFAULT);

        // Adds the user to the database
        $user = customer::create($request->toArray());

        // Creates the OAuth token
        $token = $user->createToken('Laravel Password Grant Client')->accessToken;

        // Returns the token for further use
        $response = ['token' => $token];
        return response($response, 200);
    }

    /**
     * Login function can handle customers and employees
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        // Checks the input
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        // Returns a response
        if ($validator->fails()) {
            return response(['error' => $validator->errors()->first()], 422);
        }

        // Sees if it is a customer or employee
        $user = customer::where('email', $request->email)->first();
        $employee = employee::where('email', $request->email)->first();

        // If it is an employee
        if ($employee) {
            // Checks that it is the correct password
            if (password_verify($request->password, $employee->password)) {
                // Creates and returns the token
                $token = $employee->createToken('Laravel Password Grant Client')->accessToken;
                $response = ['token' => $token];
                return response($response, 200);
            } else {
                // Returns error if passwords didn't match
                $response = ["error" => "Email or password is wrong"];
                return response($response, 422);
            }

            // Same just for users
        } elseif ($user) {

            if (password_verify($request->password, $user->password)) {
                $token = $user->createToken('Laravel Password Grant Client')->accessToken;
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

    /**
     * Logs out user
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function logout (Request $request) {
        // Gets the token
        $token = $request->user()->token();
        // Revokes it
        $token->revoke();
        // Returns a success message
        $response = ['message' => 'You have been successfully logged out!'];
        return response($response, 200);
    }
}
