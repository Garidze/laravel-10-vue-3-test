<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PageRequest;

class PageController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function store(PageRequest $request)
    {
        dd($request->file('image'));
//        $request->file('image')->store('images', 'public');
        if($request->file('image'))
        {
            dd('validate - ok');
//            foreach ($request->file('image') as $image){
//                $image->store('images', 'public');
//            }
        }
        return redirect()->route('main');
    }
}
