<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StuInCourse;
use Illuminate\Support\Facades\DB;

class StuInCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = StuInCourse::all();
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
        try {
            $data = StuInCourse::Create(
           [
               'idCourse' => $request->idCourse,
               'idStudent' => $request->idStudent,
               'isPay' => $request->isPay,
           ]
       );
       return response()->json(['status' => 'successful',
           'mess' => 'ok']);
       } catch (Exception $e) {
           return response()->json(['status' => 'failed',
                                   'mess' => $e]);
       }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // show theo id course
        $data = StuInCourse::where('idCourse', $id)
        ->join('students', 'students.id', '=', 'stu_in_courses.idStudent')
        ->get();
        return response()->json(['status' => 'successful',
                                    'data' => $data]);
    }

    public function listStudent($id)
    {
        $data = DB::table('students')
                    ->select('students.id', 'students.name')
                    ->join(DB::raw('(SELECT * FROM `stu_in_courses` WHERE idCourse = ' . $id . ' ) courseOfStudent' ), 
                    function($join)
                    {
                        $join->on('students.id', '=', 'courseOfStudent.idStudent');
                    })
                    ->get();
        if($data == null){
            return response()->json(['status' => 'failed',
            'mess' =>  'null']);  
        }
        else
            return response()->json(['status' => 'successful',
                                    'data' => $data]);
    }


    public function listStudentNull($id)
    {
        $data = DB::table('students')
                    ->select('students.id', 'students.name')
                    ->leftJoin(DB::raw('(SELECT * FROM `stu_in_courses` WHERE idCourse = ' . $id . ' ) courseOfStudent' ), 
                    function($join)
                    {
                        $join->on('students.id', '=', 'courseOfStudent.idStudent');
                    })
                    ->whereNull('courseOfStudent.idCourse')
                    ->get();
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
        // try {
        //     StuInCourse::where('id', $id)->delete();
        //     return response()->json(['status' => 'successful']);
        // } catch (Exception $th) {
        //     return response()->json(['status' => 'failed',
        //                              'error' => $th]);
        // }
    }
}
