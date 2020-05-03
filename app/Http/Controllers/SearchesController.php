<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Search;

class SearchesController extends Controller
{
    public function result()
    {
        
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            
        ]);

        $request->apiSearch()->create([
            'content1' => $request->content1,
            'content2' => $request->content2,
        ]);
    }
    
    public function create()
    {
        $search = new Search;
        
        return view('');
    }
}
