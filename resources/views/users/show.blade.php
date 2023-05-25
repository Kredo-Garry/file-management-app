@extends('layouts.app')

@section('title', 'File Details')

@section('content')
    <div class="row border-shadow p-5 m-0">
        <div class="col">
            <img src="{{asset('/storage/images/' . $show_file_details->the_file)}}" alt="{{$show_file_details->the_file}}" class="" style="width:800px; height:600px;">
        </div>
        <div class="col-4 bg-white ps-0">
            <div class="card border align-items-center">
                <div class="card-header bg-white py-3">
                    <h3 class="text-muted">Recorded By: {{$show_file_details->received_by}}</h3>
                </div>
                <div class="card-body w-75">
                    <div class="col-auto">
                        <p class="text-muted p-0 m-0"> <span class="fw-bold">Memorandum Number:</span>{{$show_file_details->memo_number}} </p>
                        <p class="text-muted p-0 m-0"><span class="fw-bold">Name Of File:</span> {{$show_file_details->name_of_file}}</p>
                        <p class="text-muted"><span class="fw-bold">Description:</span> {{$show_file_details->description}}</p>
                        <p class="bg-dark text-white fw-bold p-2 rounded"><span class="fw-bold">Status:</span> {{$show_file_details->status}}</p>
                        <hr>
                        <p class="text-muted small p-0 m-0"><span>Received By:</span>{{$show_file_details->received_by}}</p>
                        <p class="text-muted small p-0 m-0"><span>Recorded On:</span>{{$show_file_details->created_at}}</p>
                        <p class="text-muted small p-0 m-0"><span>Received By:</span>{{$show_file_details->received_from}}</p>
                        <hr>
                            {{-- Notes Section --}}
                            <form action="{{route('note.store', $show_file_details->id)}}" method="post">
                                @csrf
                                <label for="add-notes" class="form-label fw-bold text-muted">Add Notes</label>
                                @error('add_notes')
                                    <p class="text-danger small">{{$message}}</p>
                                @enderror
                                <textarea name="add_notes" id="add-notes" cols="30" rows="3" class="form-control mb-2"></textarea>
                                <button type="button" class="btn btn-outline-dark btn-sm">Cancel</button>
                                <button type="submit" class="btn btn-dark btn-sm">Save</button>
                                {{-- <a href="#" class="btn btn-dark fw-bold btn-sm">View Notes</a> --}}
                                <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#note-modal-{{$show_file_details->id}}">
                                    View Notes
                                </button>
                            </form>
                            @include('users.files.notes.filenotes')
                        <hr>
                        <div class="d-flex justify-content-center">
                            <form action="#" method="post" class="p-1">
                                @csrf
                                <button type="submit" class="btn btn-dark btn-sm">Edit Record</button>
                            </form>
                            <form action="#" method="post" class="p-1">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Delete Record</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
