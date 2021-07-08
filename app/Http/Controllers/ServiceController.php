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
        $service=new Service();
        $service->name=$request->service;
        $service->description=$request->description;
        $service->save();
        return redirect('/service')->with('success', 'Service saved!');
      
    }
}
