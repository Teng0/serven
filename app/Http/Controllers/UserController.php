<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function uploadAvatar( Request $request){
        if ($request->hasFile("image")){
            if (auth()->user()->avatar){

                Storage::delete("/public/images/".auth()->user()->avatar);
            }
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs("images",$filename,"public");


            auth()->user()->update(["avatar"=>$filename]);
           // $request->session()->flash("message","Image Uploaded Succesfully");
            return redirect()->back()->with("message","Image Uploaded Succesfully");
        }
        $request->session()->flash("error","Image not Uploaded ");

        return redirect()->back();
    }
    public function index(){

//        DB::insert('insert into users (name,
//        email,
//        password) values (?, ?,?)', ['Tengo',"tengosmail@gmail.com","123456789"]);
//

//
//        $update = DB::update("update users set  password = 'password' where name='Tengo'");
        $users =  DB::select('select * from users');

        $user = new User();
        $data = [
            'name'=>'Ilon2',
            'email'=>'Mask2@gmail.com',
            'password'=>'passwprd'
        ];
       // User::create($data);


//        $user->name = "Tengo2";
//        $user->email = "Tengo2@gmail.com";
//        $user->password = "Password2";
//        $user->save();

        $users =  User::all();


        return $users;
    }
}
