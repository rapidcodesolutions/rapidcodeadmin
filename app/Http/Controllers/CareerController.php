<?php

namespace App\Http\Controllers;

use App\Career;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index() {
        $career=Career::all();
        return view('admin.career.index',compact('career'));
     }
    public function store(Request $request) {
     
    
        $career=new career();
        $career->designation=$request->designation;
        $career->description=$request->description;
      
        $career->save();
        return redirect('/career')->with('success', 'Career saved!');
      
    }
    //
}
