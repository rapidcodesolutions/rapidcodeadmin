<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index() {
        $team=Team::all();
        return view('admin.team.index',compact('team'));
     }
    public function store(Request $request) {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
  
        $imageName = time().'.'.$request->image->extension();  

        $request->image->move(public_path('images'), $imageName);
        $team=new Team();
        $team->name=$request->name;
        $team->designation=$request->designation;
        $team->image=$imageName;
        $team->link=$request->link;
        $team->save();
        return redirect('/team')->with('success', 'Team saved!');
      
    }
    //
}
