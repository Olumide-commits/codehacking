<?php

namespace App\Http\Controllers;


use App\Models\Role;
use App\Models\User;
use App\Models\Photo;
use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
use App\Http\Requests\UserEditRequest;
use Illuminate\Support\Facades\Session;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //To get the role details from the database used in the user create template
        $roles = Role::pluck('name','id')->all();



        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UsersRequest $request)
    {
        //
        $input = $request->all();

        if($file = $request->file('photo_id')){

           $name = time() . $file->getClientOriginalName();

           $file->move('images', $name);

           $photo = Photo::create(['file'=>$name]);

           $input['photo_id']= $photo->id;
        }



        $user = User::create($input);


        // $user = User::create($request->all());

        return redirect('/admin/user');



        // return $request->all();




    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $user = User::findOrFail($id);

        $roles = Role::pluck('name','id')->all();

        return view('admin.users.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserEditRequest $request, string $id)
    {
        //
        $user = User::findOrFail($id);


        $input = $request->all();

        if($file = $request->file('photo_id')){

           $name = time() . $file->getClientOriginalName();

           $file->move('images', $name);

           $photo = Photo::create(['file'=>$name]);

           $input['photo_id']= $photo->id;
        }

        $user->update($input);

        return redirect('/admin/user');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        $user = User::findOrFail($id);

        //To delete the image file with the deleted user
        unlink(public_path() . $user->photo->file);

        $user->delete();

       Session::flash('deleted_user','The user has been deleted');

        return redirect('/admin/user');
    }





}



