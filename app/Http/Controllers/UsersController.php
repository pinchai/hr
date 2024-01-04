<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    //
    public static function index(Request $request){
        $data  = User::all();
        return view('user.user', ['data'=>$data]);
    }

    public static function index_create(Request $request){
        return view('user.create');
    }

    public function create(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->gender = $request->gender;
        $user->email = time().'@mail.com';
        $user->permission = $request->permission;

        $user->password = Hash::make($request->input('password'));
        if ($user->save()){
            if (isset($request->image)){
                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('images'), $imageName);
                $user->profile = $imageName;
                $user->save();
            }
        }

        return redirect(route('index_user'));
    }

    public static function confirm_delete(Request $request){
        $user_id = $request->query('user_id');
        $data = User::find($user_id);
        return view('user.confirm_delete', ['data'=>$data]);
    }

    public static function delete(Request $request){
        $user_id = $request->id;
        $data = User::find($user_id);
        if ($data){
            $data->delete();
            //$data->forceDelete();
        }
        return redirect(route('index_user'));
    }


    public static function index_update_user(Request $request){
        $user_id = $request->query('user_id');
        $data = User::find($user_id);
        return view('user.edit', ['data'=>$data]);
    }

    public function update(Request $request){
        $user = User::find($request->id);
        if ($user){
            $user->name = $request->name;
            $user->gender = $request->gender;
            $user->email = time().'@mail.com';
            $user->password = Hash::make($request->input('password'));
            if ($user->save()){
                if (isset($request->image)){
                    $imageName = time().'.'.$request->image->extension();
                    $request->image->move(public_path('images'), $imageName);
                    $user->profile = $imageName;
                    $user->save();
                }
            }
        }

        return redirect(route('index_user'));
    }

}
