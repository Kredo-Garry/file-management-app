<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\File;

class FilesController extends Controller
{
    private $file;

    public function __construct(File $file){
        $this->file = $file;
    }

    public function index(){
        $all_files = $this->file->latest()->paginate(5);
        return view('admin.files.index')->with('all_files', $all_files);
    }

}
