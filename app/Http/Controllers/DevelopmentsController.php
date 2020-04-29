<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DevelopmentsController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $developments = $user->developments()->orderBy('created_at', 'desc')->paginate(10);
            
            $data = [
                'user' => $user,
                'developments' => $developments,
            ];
        }
        
        return view('welcome', $data);
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:191',
        ]);

        $request->user()->developments()->create([
            'content' => $request->content,
        ]);

        return back();
    }
    
    public function destroy($id)
    {
        $development = \App\Development::find($id);

        if (\Auth::id() === $development->user_id) {
            $development->delete();
        }

        return back();
    }
}
