<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use App\Models\User;

class HomeController extends Controller
{
    private $user;
    private $file;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(File $file, User $user)
    {
        // $this->middleware('auth');
        $this->file = $file;
        $this->user = $user;

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $all_files = $this->file->latest()->get();
        return view('users.home')->with('all_files',$all_files);
    }
    public function show($id){
        $show_file_details = $this->file->findOrFail($id);
        return view('users.show')->with('show_file_details', $show_file_details);
    }

    public function search(Request $request){
        $files = $this->file->where('name_of_file', 'like', '%'.$request->search. '%')->get();
        return view('files.search')->with('files',$files)->with('search', $request->search);
    }
}
