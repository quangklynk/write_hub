<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Post::with(['student:id,name', 'category:id,name', 'type:id,name', 'status:id,name'])->get();
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
            $data = Post::updateOrCreate(
           ['id' => $request->id],
           [
               'idStudent' => $request->idStudent,
               'idExam' => $request->idExam,
               'idType' => $request->idType,
               'idCategory' => $request->idCategory,
               'idStatus' => $request->idStatus,
               'content' => $request->content,
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
     * @param  int  $idTeacher, $idExam
     * @return \Illuminate\Http\Response
     */
    public function show($idTeacher, $idExam)
    {
        // show danh sach cac post chưa chấm điểm của exam có Teacher
        $data = Post::with(['student:id,name', 'category:id,name', 'type:id,name', 'status:id,name'])
        ->where('idTeacher', $idTeacher)
        ->whereNull('score')
        ->where('idExam','=',$idExam)
        ->get();
        return response()->json(['status' => 'successful',
                                    'data' => $data]);
    }

    public function showByID($idPost)
    {
        $data = Post::with(['student:id,name', 'category:id,name', 'type:id,name', 'status:id,name'])
        ->where('id','=',$idPost)
        ->first();


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
        DB::beginTransaction();
            try {
                //code...
                if ($data = Post::where(['id'=> $id])
                    ->update(['score' => $request->score])
                    )
                {
                    DB::commit();
                    return response()->json(['status' => 'successful',
                        'mess' => 'Grading post successful',
                        'score' => $request->score]);
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
    }
}
