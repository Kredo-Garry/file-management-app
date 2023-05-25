<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Note;

class NoteController extends Controller
{
    private $note;

    public function __construct(Note $note){
        $this->note = $note;
    }

    public function store(Request $request, $file_id){
        $request->validate([
            'add_notes' => 'required|min:1|max:1000'
        ]);

        $this->note->user_id = Auth::user()->id;
        $this->note->file_id = $file_id;
        $this->note->file_notes = $request->add_notes;
        $this->note->save();

        return redirect()->back();
    }

    public function show($id){
        $all_notes = $this->note->findOrFail($id);
        return view('users.show')->with('all_notes' ,$all_notes);
    }

    public function editNotes(Request $request, $note_id){
        $request->validate([
            'edit_notes' => 'required|min:1|max:1000'
        ]);

        $note = $this->note->findOrFail($note_id);

        $note->file_notes = $request->edit_notes;
        $note->save();

        return redirect()->back();
    }
}
