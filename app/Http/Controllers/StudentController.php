<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Student::with('user:id,email,flag,idRole')->get();
        return response()->json(['status' => 'successful',
                                    'data' => $data]);
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
        $data = Student::find($id);
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
            // $data = Student::find($id);
            // if(!$data){
            //     return response()->json(['status' => 'failed',
            //                             'mess' =>  'null']);  
            // }
            // else
            // {
            //     $data->name = $request->name;
            //     $data->birth = $request->birth;
            //     $data->address = $request->address;
            //     $data->save();
            //     return response()->json(['status' => 'successful',
            //     'mess' => 'Luu thanh cong']);
            // }
            DB::beginTransaction();
            try {
                //code...
                if ($data = Student::where(['id'=> $id])
                    ->update(['name' => $request->name,
                            'birth' => $request->birth,
                            'address' => $request->address]))
                {
                    DB::commit();
                    return response()->json(['status' => 'successful',
                        'mess' => 'Luu thanh cong']);
                } else {
                    return response()->json(['status' => 'failed',
                                                'mess' =>  'null']);  
                }
            } catch (Exception $e) {
                DB::rollBack();
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
            Student::where('id', $id)->delete();
            return response()->json(['status' => 'successful']);
        } catch (Exception $ex) {
            return response()->json(['status' => 'failed',
                                     'error' => $ex]);
        }
    }
}
