<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index() {
        $service=Service::all();
        return view('admin.service.index',compact('service'));
     }
    public function store(Request $request) {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $service=new Service();
        $service->name=$request->service;
        $service->description=$request->description;
        $service->image=$imageName;
        $service->save();
        return redirect('/service')->with('success', 'Service saved!');
      
    }
}
