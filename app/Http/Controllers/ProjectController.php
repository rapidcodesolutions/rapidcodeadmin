<?php

namespace App\Http\Controllers;

use App\Category;
use App\Project;
use Illuminate\Http\Request;
use DB;
class ProjectController extends Controller
{
    public function index() {
        $project = DB::table('projects')
        ->join('categories', 'categories.id', '=', 'projects.category_id')
        ->select('projects.*', 'categories.name as catname')
        ->get();
        // echo '<pre>';
        // print_r($project);
        // exit;
        //$project=Project::all();
        $categories = DB::table('categories')->pluck("name","id");
        $category=Category::all();
        return view('admin.project.index',compact('project','categories'));
     }
    public function store(Request $request) {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
  
        $imageName = time().'.'.$request->image->extension();  

        $request->image->move(public_path('images'), $imageName);
        $project=new Project();
        $project->name=$request->name;
        $project->category_id=$request->category_id;
        $project->description=$request->description;
        $project->image=$imageName;
        $project->save();
        return redirect('/project')->with('success', 'Team saved!');
      
    }
    //
}
