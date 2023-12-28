<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    //
    public static function index(Request $request){
        $data = User::all();
        return view('users.users', ['data'=>$data]);
    }

    public static function index_create(Request $request){
        return view('users.create');
    }

    public static function confirm_delete(Request $request){
        $user_id = $request->query('id');
        $data = User::find($user_id);
        return view('users.confirm_delete', ['data'=>$data]);
    }

    public static function delete_user(Request $request){
        $user_id = $request->id;
        $data = User::find($user_id);
        if ($data){
            $data->delete();
        }
        return redirect(route('index_user'));
    }


    public function create(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = time().'@mail.com';
        $user->password = Hash::make($request->input('password'));
        if ($user->save()){
            if (isset($request->image)){
                $imageName = time().'.'.$request->image->extension();
                $profile =  $request->image->move(public_path('images'), $imageName);
                $user->image = $imageName;
                $user->save();
            }
        }

        return redirect(route('index_user'));
    }
}
