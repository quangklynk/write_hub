<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Role::with('user:id,idRole,email')->get();
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
             $data = Role::updateOrCreate(
            ['id' => $request->id],
            [
                'des' => $request->des
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
        $data = Role::find($id);
        // Viết thêm if else
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
        try {
            Role::where('id', $id)->delete();
            return response()->json(['status' => 'successful']);
        } catch (Exception $th) {
            return response()->json(['status' => 'failed',
                                     'error' => $th]);
        }
    }
}
