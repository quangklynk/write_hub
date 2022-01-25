<?php

namespace App\Http\Controllers\_AuthController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Models\Teacher;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            $data = User::with('role:id,des')->where('email', $request->email)->first();
            if ($data->idRole != '3') {
               $data->user = Teacher::where('idUser', $data->id)->first();
            }else {
                $data->user = Student::where('idUser', $data->id)->first();
            }
            $tokenData = $data->createToken($data->email.'-'.now(), [$data->role->des]);

            return response()->json([  'status' => 'success',
                                'data' => $data, 
                                'token' => $tokenData->accessToken]);
        }else{
            return response()->json([  'status' => 'fail',
                                'mess' => 'check lại tài khoản']);
        }
    }

    public function logout (Request $request) {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
}
