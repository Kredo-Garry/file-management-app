<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;
use App\Models\File;

class fileController extends Controller
{
    const LOCAL_STORAGE_FOLDER = 'public/images/';
    private $file;

    public function __construct(File $file){
        $this->file = $file;
    }

    public function addFile(){
        return view('users.files.addfile');
    }

    public function store(Request $request){
        $request->validate([
            'name_of_file'                  => 'required|min:1|max:100',
            'memo_number'                   => 'required|min:1|numeric',
            'description_of_the_file'       => 'required|min:1|max:1000',
            'received_by'                   => 'required|min:1|max:50',
            'file_status'                   => 'required',
            'received_from'                 => 'required|min:1|max:50',
            'the_file'                      => 'required|mimes:jpeg,jpg,png,gif|max:1048'
        ]);

        $this->file->recorded_by = Auth::user()->name;
        $this->file->name_of_file = $request->name_of_file;
        $this->file->memo_number = $request->memo_number;
        $this->file->description = $request->description_of_the_file;
        $this->file->received_by = $request->received_by;
        $this->file->status = $request->file_status;
        $this->file->received_from = $request->received_from;
        $this->file->the_file = $this->imageUpload($request);
        $this->file->save();

        return redirect()->route('index');
    }

    public function imageUpload($request){
        $image_name = time() . "." . $request->the_file->extension();
        $request->the_file->storeAs(self::LOCAL_STORAGE_FOLDER, $image_name);

        return $image_name;
    }

    public function edit($id){
        $files = $this->file->findOrFail($id);
        return view('users.files.edit')->with('files' ,$files);
    }

    public function update(Request $request, $id){
        $request->validate([
            'name_of_file'                  => 'required|min:1|max:100',
            'memo_number'                   => 'required|min:1|numeric',
            'description_of_the_file'       => 'required|min:1|max:1000',
            'received_by'                   => 'required|min:1|max:50',
            'file_status'                   => 'required',
            'received_from'                 => 'required|min:1|max:50',
        ]);

        $files = $this->file->findOrFail($id);
        $files->recorded_by = Auth::user()->name;
        $files->name_of_file = $request->name_of_file;
        $files->memo_number = $request->memo_number;
        $files->description = $request->description_of_the_file;
        $files->received_by = $request->received_by;
        $files->status = $request->file_status;
        $files->received_from = $request->received_from;
        $files->save();

        return redirect()->route('index');
    }

    public function destroy($id){
        $this->file->destroy($id);
        return redirect()->route('index');
    }
}
