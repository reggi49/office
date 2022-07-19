<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
// use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\File;
// use Intervention\Image\Facades\Image;
// use Illuminate\Support\Arr;

use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
    public function create(Request $request)
    {
        if ($request->isMethod('get'))
            return view('users.form');
        else {
            $rules = [
                'name' => 'required',
                'email' => 'required',
                'no_telp' => 'required',
                'password' => 'required',
                'level' => 'required',
                'status' => 'required',
            ];
            $this->validate($request, $rules);
            $user = new User();
            if ($request->hasFile('image')) {
                $dir = 'images/';
                $extension = strtolower($request->file('image')->getClientOriginalExtension()); // get image extension
                $fileName = str_random() . '.' . $extension; // rename image
                $request->file('image')->move($dir, $fileName);
                $user->avatar = url('images/').'/'.$fileName;
            }
            $user->name = $request->name;
            $user->level = $request->level;
            $user->status = $request->status;
            $username = explode("@", $request->email);
            $user->username = $username[0];
            $user->email = $request->email;
            $user->no_telp = $request->no_telp;
            $user->level = $request->level;
            $user->status = $request->status;
            $user->password = bcrypt($request['password']);
            // dd($user);
            $user->save();
            return redirect('/users');
        }
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
    public function update(Request $request, $id)
    {
        if ($request->isMethod('get'))
            return view('users.form', ['users' => User::find($id)]);
        else {
            $rules = [
                'name' => 'required',
                'email' => 'required',
                'no_telp' => 'required',
                'level' => 'required',
                'status' => 'required',
            ];
            $this->validate($request, $rules);
            $user = User::find($id);
            if ($request->hasFile('image')) {
                $dir = 'images/';
                if ($user->image != '' && File::exists($dir . $user->image))
                    File::delete($dir . $image->image);
                $extension = strtolower($request->file('image')->getClientOriginalExtension());
                $fileName = str_random() . '.' . $extension;
                $request->file('image')->move($dir, $fileName);
                $user->avatar = url('images/').'/'.$fileName;
            } elseif ($request->remove == 1 && File::exists('images/' . $user->avatar)) {
                File::delete('images/' . $user->post_image);
                $user->avatar = null;
            }
            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->no_telp = $request->no_telp;
            $user->level = $request->level;
            $user->status = $request->status;
            // dd($user);
            //$user->password = bcrypt($request['password']);            
            
            if(empty($request->password)){
                $request->password = false;
                $user->save();
            }else{
                $user->password= bcrypt($request['password']);
                $user->save();
            }

            return redirect($request->url())->with('message', "Data user berhasil diperbaharui");

            //return redirect('/users');
        }
    }

    /**$2y$10$gYU4fQCal87Azh2/KRVtOuBJKzcrH7/7M2swXhKlSF7w.y7dyhTDi
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        User::destroy($id);
        return redirect('/users');
    }

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
