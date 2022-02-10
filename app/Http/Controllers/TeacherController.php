<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
<<<<<<< HEAD
=======
use App\User;
>>>>>>> origin/relationship_model

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
<<<<<<< HEAD
        $data = Teacher::all();
        return response()->json([
            'status' => 'successful',
            'data' => $data
        ]);
=======
        $data = Teacher::with('user:id,email,flag,idRole')->get();
        return response()->json(['status' => 'successful',
                                    'data' => $data]);
>>>>>>> origin/relationship_model
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
        //
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
        $data = Teacher::find($id);
        //
        if($data == null){
            return response()->json(['status' => 'failed',
            'mess' =>  'null']);  
        }
        else
            return response()->json(['status' => 'successful',
                                    'data' => $data]);
        
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
        try {
            $data = Teacher::find($id);
            if($data == null){
                return response()->json(['status' => 'failed',
                'mess' =>  'null']);  
            }
            else
            {
                $data->name = $request->name;
                $data->birth = $request->birth;
                $data->address = $request->address;
                $data->save();
                return response()->json(['status' => 'successful',
                'mess' => 'Luu thanh cong']);
            }

       } catch (Exception $e) {
           return response()->json(['status' => 'failed',
                                   'mess' => $e]);
       }
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
        try {
            User::where('id', $id)->update(['flag' => 1]);;
            return response()->json(['status' => 'successful']);
        } catch (Exception $ex) {
            return response()->json(['status' => 'failed',
                                     'error' => $ex]);
        }
    }

    public function revert($id)
    {
        //
        try {
            User::where('id', $id)->update(['flag' => 0]);;
            return response()->json(['status' => 'successful']);
        } catch (Exception $ex) {
            return response()->json(['status' => 'failed',
                                     'error' => $ex]);
        }
    }
}
