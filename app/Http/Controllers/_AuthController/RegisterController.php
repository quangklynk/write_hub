<?php

namespace App\Http\Controllers\_AuthController;

use App\Http\Controllers\Controller;
use App\User;
use App\Models\Teacher;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //

    public function register (Request $request) {
        $user = new User;
        DB::beginTransaction();
        try { 
            $user->email = $request->email;
            $user->flag = 0;
            $user->idRole = 3;
            $user->password = Hash::make($request->password);
            $user->save();
    
            $student = new Student;
            $student->name = $request->name;
            $student->address = $request->address;
            $student->birth = $request->birth;
            $student->idUser =  $user->id;
            $student->save();
            
            DB::commit();
            return response()->json(['status' => 'successful']);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['status' => 'failed',
                                     'error' => $e]);
        }
    }

    public function registerTeacher (Request $request) {
        $user = new User;
        DB::beginTransaction();
        try { 
            $user->email = $request->email;
            $user->flag = 0;
            $user->idRole = 2;
            $user->password = Hash::make($request->password);
            $user->save();
    
            $teacher = new Teacher;
            $teacher->name = $request->name;
            $teacher->address = $request->address;
            $teacher->birth = $request->birth;
            $teacher->idUser =  $user->id;
            $teacher->save();
            
            DB::commit();
            return response()->json(['status' => 'successful',
                                        'data' => $user]);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['status' => 'failed',
                                     'error' => $e]);
        }
    }
}
