<?php
namespace App\Http\Controllers;
     
use App\User;
use Illuminate\Http\Request;
use DataTables;
     
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user=User::all();
        return view('admin.user.index',compact('user'));
        // if ($request->ajax()) {
        //     $data = User::latest()->get();
        //     return Datatables::of($data)
        //             ->addIndexColumn()
        //             ->addColumn('action', function($row){
   
        //                    $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
     
        //                     return $btn;
        //             })
        //             ->rawColumns(['action'])
        //             ->make(true);
        // }
      
        // return view('admin.category.add');
    }

    public function store(Request $request) {
        $user=User::all();
       
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=password_hash($request->password, PASSWORD_DEFAULT);;
        $user->save();
        return redirect('/users');
      
    }
}