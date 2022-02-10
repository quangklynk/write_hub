<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Exception;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Category::all();
        return response()->json([
            'status' => 'successful',
            'data' => $data
        ]);
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
        try {
            $data = Category::updateOrCreate(
                ['id' => $request->id],
                [
                    'name' => $request->name,
                ]
            );
            return response()->json([
                'status' => 'successful',
                'mess' => 'Luu thanh cong'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'mess' => $e
            ]);
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
        $data = Category::find($id);
        //
        if ($data == null) {
            return response()->json([
                'status' => 'failed',
                'mess' =>  'null'
            ]);
        } else {
            return response()->json([
                'status' => 'successful',
                'data' => $data
            ]);
        }
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
            Category::where('id', $id)->delete();
            return response()->json(['status' => 'successful']);
        } catch (Exception $ex) {
            return response()->json([
                'status' => 'failed',
                'error' => $ex
            ]);
        }
    }
}
