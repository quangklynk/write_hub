<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Examination;
use Illuminate\Support\Facades\DB;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Examination::with(['teacher:id,name','course:id,name'])->get();
        // Viết thêm if else
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
            $data = Examination::updateOrCreate(
            ['id' => $request->id],
            ['dateExam' => $request->dateExam,
            'idCourse' => $request->idCourse,
            'idTeacher' => $request->idTeacher,
            'duration' => $request->duration,
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
        //
        $data = Examination::find($id);

        // $data = Examination::with(['teacher:id,name','course:id,name'])->find($id);

        //
        if($data == null){
            return response()->json(['status' => 'failed',
            'mess' =>  'null']);  
        }
        else
            return response()->json(['status' => 'successful',
                                    'data' => $data]);
    }

    public function showForStudent($id)
    {
        // $data = Examination::all();
        // $courseOfStudent = DB::table('stu_in_courses')
        //                 ->select('idCourse')
        //                 ->where('idStudent', $id)
        //                 ->get();

        // $data = DB::table('examinations')
        //             ->joinSub($courseOfStudent, 'courseOfStudent', function ($join) {
        //             $join->on('examinations.idCourse', '=', 'courseOfStudent.idCourse');
        //             })->get();

        //

        $data = DB::table('examinations')
                    ->select('dateExam', 'examinations.id')
                    ->join(DB::raw('(SELECT idCourse FROM `stu_in_courses` WHERE idStudent = ' . $id . ' ) courseOfStudent' ), 
                    function($join)
                    {
                    $join->on('examinations.idCourse', '=', 'courseOfStudent.idCourse');
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
        try {
            Examination::where('id', $id)->delete();
            return response()->json(['status' => 'successful']);
        } catch (Exception $e) {
            return response()->json(['status' => 'failed',
                                     'error' => $e]);
        }
    }
}
