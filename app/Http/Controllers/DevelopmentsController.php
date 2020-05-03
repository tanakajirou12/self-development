<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Development;

class DevelopmentsController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $developments = $user->feed_developments()->orderBy('created_at', 'desc')->paginate(10);
            
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
            'title' => 'required|max:191',
            'content1' => 'required|max:191',
            'content2' => 'required|max:191',
        ]);

        $request->user()->developments()->create([
            'title' => $request->title,
            'content1' => $request->content1,
            'content2' => $request->content2,
        ]);
        
        
        
        return redirect('/');
    }
    
    public function destroy($id)
    {
        $development = \App\Development::find($id);

        if (\Auth::id() === $development->user_id) {
            $development->delete();
        }

        return back();
    }
    
    public function create()
    {
        $development = new Development;

        return view('developments.create', [
            'development' => $development,
        ]);
    }
    
    public function show()
    {
        $development = Development::find($id);

        return view('developments.show', [
            'development' => $development,
        ]);
    }
    
    public function edit($id)
    {
        $development = Development::find($id);

        return view('developments.edit', [
            'development' => $development,
        ]);
    }
    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:191',
            'content1' => 'required|max:191',
            'content2' => 'required|max:191',
        ]);
        
        $development = Development::find($id);
        $development->title = $request->title;
        $development->content1 = $request->content1;
        $development->content2 = $request->content2;
        $development->save();

        return view('developments.show', [
            'development' => $development,
        ]);
    }
}
