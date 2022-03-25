<?php
namespace App\Http\Controllers;
use App\Http\Requests\AuthRequest;
use App\Models\customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function register(AuthRequest $request)
    {
        $requestData = $request->all();


//        $requestData['password'] = Hash::make($requestData['password']);

        $requestData['password'] = password_hash($requestData['password'],PASSWORD_DEFAULT );

        $user = customer::create($requestData);

        return response([ 'status' => true, 'message' => 'User successfully register.' ], 200);
    }

    public function login(Request $request)
    {
        $requestData = $request->all();
        $validator = Validator::make($requestData,[
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $type = "";
        if (customer::where('email', $requestData['email'])->first()){
            $type = "customer";
        }else{
            $type = "employee";
        }


        return response($type, 200);
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
