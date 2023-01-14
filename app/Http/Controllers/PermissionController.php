<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::orderBy('id' , 'desc')->paginate(5);
        return response()->view('cms.permission.index' , compact('permissions'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('cms.permission.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(),[
            'name_permission'=> 'required|string|min:3|max:50',
            'status' => 'required'
        ],[
            'name_permission.required' =>"Please enter name permission !",
            'name_permission.min' =>"No accept less than 3 latter !",
            'name_permission.max' =>"No accept more than 50 latter !",
            'status.required' =>"Please enter status !",
        ]
    
    );

        if(! $validator->fails()){
            $permissions = new Permission();
            $permissions->name_permission = request()->get('name_permission');
            $permissions->status = request()->get('status');

            $isSaved = $permissions->save();
            if ($isSaved) {
            return response()->json(['icon' => 'success' , 'title' => "created is successfully"] , 200);

            } 
        }
        else{
            return response()->json(['icon' => 'error' , 'title' =>$validator->getMessageBag()->first()] , 400);
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permissions = Permission::findOrFail($id);
        return response()->view('cms.permission.edit' , compact('permissions'));
        
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
        $validator = Validator($request->all(),[
            'name_permission'=> 'required|string|min:3|max:50',
            'status' => 'required'
        ],[
            'name_permission.required' =>"Please enter name permission !",
            'name_permission.min' =>"No accept less than 3 latter !",
            'name_permission.max' =>"No accept more than 50 latter !",
            'status.required' =>"Please enter status !",
        ]
    
    );

        if(! $validator->fails()){
            $permissions = Permission::findOrFail($id);
            $permissions->name_permission = request()->get('name_permission');
            $permissions->status = request()->get('status');

            $isSaved = $permissions->save();
            return ['redirect' => route('permissions.index') ];

            if ($isSaved) {
            return response()->json(['icon' => 'success' , 'title' => "created is successfully"] , 200);

            } 
        }
        else{
            return response()->json(['icon' => 'error' , 'title' =>$validator->getMessageBag()->first()] , 400);
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
        $permissions = Permission::destroy($id);
        return response()->json(['icon' => 'success' , 'title' => "Deleted is successfully"] , 200);
 
    }
}
