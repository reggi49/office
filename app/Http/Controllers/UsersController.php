<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
// use App\Http\Controllers\Controller;
use App\User;
// use Intervention\Image\Facades\Image;
// use Illuminate\Support\Arr;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $users = User::orderBy('name')->paginate(10);
        $usersCount = User::count();

        return view('users.index',compact('users','usersCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        return view("users.create", compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd("reggi");
        if($request->hasfile('gambar1'))
         {
            $file = $request->file('gambar1');
            $gambar1=time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $gambar1);
         }

        $user = new User;
        $user->name=$request->get('nama');
        $user->username=$request->get('username');
        $user->email=$request->get('email');
        $user->no_telp=$request->get('no_telp');
        $user->password= bcrypt($request['password']);
        $user->avatar=$gambar1;
        $user->save();

        //$data = $this->handleRequest($request);
        //$newUser = $request->user()->create($data);
        //$newUser->attachRole($request->role);

        //User::create($passwd);
        return redirect("users")->with("message", "New user was created successfuly!");
    }

    private function handleRequest($request)
    {
        $data = $request->all();

        if($request->hasFile('avatar'))
        {
            $image = $request->file('avatar');
            $fileName = time().'-'.$image->getClientOriginalName();
            $destination = $this->uploadPath;

            $successUploaded = $image->move($destination, $fileName);

            if ($successUploaded)
            {
                $width = config('cms.image.thumbnail.width');
                $height = config('cms.image.thumbnail.height');
                $extension = $image->getClientOriginalExtension();
                $thumbnail = str_replace(".{$extension}","_thumb.{$extension}",$fileName);

                Image::make($destination.'/'.$fileName)
                    ->resize($width,$height)
                    ->save($destination.'/'.$thumbnail);
            }
            $data['avatar'] = $fileName;
        }

        return $data;
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
        $user = User::findOrFail($id);
        return view("users.edit", compact('user','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests $request, $id)
    {
        $user = User::find($id);
        if($request->hasfile('gambar1'))
         {
            $file = $request->file('gambar1');
            $gambar1=time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $gambar1);
         }
        $user = new User;
        $user->name=$request->get('nama');
        $user->username=$request->get('username');
        $user->email=$request->get('email');
        $user->no_telp=$request->get('no_telp');
        $user->password= bcrypt($request['password']);
        $user->foto=$gambar1;
        $user->save();


        //$data = $this->handleRequest($request);
        
        // $newPassword = $data['password'];
        // if(empty($newPassword)){
        //     //$data['password'] = bcrypt($data['password']);
        //     $user->update(array_except($data, ['password']));
        // }else{
        //     $data['password'] = bcrypt($data['password']);
        //     $user->update($data);
        // }

        // $user->detachRoles();
        // $user->attachRole($request->role);
        
        return redirect("/backend/users")->with("message", "User was updated successfuly!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requests\UserDestroyRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $deleteOption = $request->delete_option;
        $selectedUser = $request->selected_user;

        if($deleteOption == "delete"){
            $user->posts()->withTrashed()->forcedelete();
        }
        elseif($deleteOption == "attribute"){
            $user->posts()->update(['author_id' => $selectedUser]);
        }
        $user->delete();

        return redirect("/backend/users")->with("message", "User was deleted!");
    }
    public function confirm(Requests\UserDestroyRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $users = User::where('id','!=',$user->id)->pluck('name','id');

        return view("/backend/users.confirm",compact('user','users'));
    }
}
