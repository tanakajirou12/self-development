<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; 
use App\Development;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);

        return view('users.index', [
            'users' => $users,
        ]);
    }
    
    public function show($id)
    {
        $user = User::find($id);
        $developments = $user->developments()->orderBy('created_at', 'desc')->paginate(10);

        $data = [
            'user' => $user,
            'developments' => $developments,
        ];

        $data += $this->counts($user);

        return view('users.show', $data);
    }
    
    public function search(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:191',
        ]);
        
        $users = User::orderBy('id', 'desc')->paginate(10);
        $ret = $this->apiSearch($request->title);
        
        //dd($ret);
        
        return view('users.search', [
            'users' => $users,
            'ret' => $ret,
            'title' => $request->title,
        ]);
    }
    
    public function followings($id)
    {
        $user = User::find($id);
        $followings = $user->followings()->paginate(10);

        $data = [
            'user' => $user,
            'users' => $followings,
        ];

        $data += $this->counts($user);

        return view('users.followings', $data);
    }

    public function followers($id)
    {
        $user = User::find($id);
        $followers = $user->followers()->paginate(10);

        $data = [
            'user' => $user,
            'users' => $followers,
        ];

        $data += $this->counts($user);

        return view('users.followers', $data);
    }
}