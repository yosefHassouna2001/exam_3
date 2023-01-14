<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Permission::orderBy('id' , 'desc')->paginate(5);
        return response()->view('cms.role.index' , compact('roles'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return response()->view('cms.role.create' , compact('permissions'));
        
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
        ],[
        ]
    
    );

        if(! $validator->fails()){
            $roles = new Role();
            $roles->job_name = request()->get('job_name');
            $roles->name_user = request()->get('name_user');
            $roles->permission_id = request()->get('permission_id');

            $isSaved = $roles->save();
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
        $roles = Role::findOrFail($id);
        $permissions = Permission::all();

        return response()->view('cms.role.edit' , compact('roles' ,'permissions'));
        
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
        ],[
        ]
    
    );

        if(! $validator->fails()){
            $roles = Role::findOrFail($id);
            $roles->job_name = request()->get('job_name');
            $roles->name_user = request()->get('name_user');
            $roles->permission_id = request()->get('permission_id');

            $isSaaved = $roles->save();
            return ['redirect' => route('roles.index') ];

            if ($isSaaved) {
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
        $roles = Role::destroy($id);
        return response()->json(['icon' => 'success' , 'title' => "Deleted is successfully"] , 200);
 
    }
}
