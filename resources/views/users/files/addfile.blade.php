@extends('layouts.app')

@section('title', 'Add File Page')

@section('content')
    <form action="{{route('file.store')}}" method="post" class="mx-auto w-25 shadow-lg" enctype="multipart/form-data">
        @csrf
        <div class="card text-center">
            <div class="card-header bg-dark text-white">
              File Details
            </div>
            <div class="card-body">
                <div class="form-floating mb-2">
                    <input type="text" name="name_of_file" class="form-control rounded-0 border border-top-0 border-end-0 border-start-0 border-dark" id="name_of_the_file" placeholder="add name of the file here" value="{{old('name_of_file')}}">
                    @error('name_of_file')
                        <p class="text-danger small">{{$message}}</p>
                    @enderror
                    <label for="name_of_the_file">Name Of The File</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="text" name="memo_number" class="form-control rounded-0 border border-top-0 border-end-0 border-start-0 border-dark" id="memo_number" placeholder="Memorandum number here" value="{{old('memo_number')}}">
                    @error('memo_number')
                        <p class="text-danger small">{{$message}}</p>
                    @enderror
                    <label for="memo_number">Memo Number</label>
                </div>

                <div class="form-floating mb-2">
                    <textarea name="description_of_the_file" id="description_of_the_file" rows="10" class="form-control rounded-0 border border-top-0 border-end-0 border-start-0 border-dark">{{old('description_of_the_file')}}</textarea>
                    @error('description_of_the_file')
                        <p class="text-danger small">{{$message}}</p>
                    @enderror
                    <label for="description_of_the_file fw-bold">Description</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="text" name="received_by" class="form-control rounded-0 border border-top-0 border-end-0 border-start-0 border-dark" id="received_by" placeholder="Person who received the file" aria-describedby="date-and-time-received" value="{{old('received_by')}}">
                    <div class="form-text" id="date-and-time-received">
                        Note: Date and time is automatically added.
                    </div>
                    @error('received_by')
                        <p class="text-danger small">{{$message}}</p>
                    @enderror
                    <label for="received_by">Received By</label>
                </div>
                <div class="form-floating mb-2">
                    {{-- <input type="text" name="file_status" class="form-control rounded-0 border border-top-0 border-end-0 border-start-0 border-dark" id="file_status"> --}}
                    <select name="file_status" id="file_status" class="form-select" value="{{old('file_status')}}">
                        <option value="" hidden>Select File Status</option>
                        <option value="Received">Received</option>
                        <option value="Cancelled">Cancelled</option>
                        <option value="Returned">Returned</option>
                    </select>
                    @error('file_status')
                        <p class="text-danger small">{{$message}}</p>
                    @enderror
                    <label for="file_status">File Status</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="text" name="received_from" class="form-control rounded-0 border border-top-0 border-end-0 border-start-0 border-dark" id="received_by" placeholder="Person who delivered the file" value="{{old('received_from')}}">
                    @error('received_from')
                        <p class="text-danger small">{{$message}}</p>
                    @enderror
                    <label for="received_by">Received From</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="file" name="the_file" id="the-file" class="form-control rounded-0 border border-top-0 border-end-0 border-start-0" aria-describedby="file-info">
                    <div class="form-text">
                        Upload a scanned copy of the file in image format.<br>
                        Maximum File Size: 1048Kb
                    </div>
                    @error('the_file')
                        <p class="text-danger small">{{$message}}</p>
                    @enderror
                    {{-- <label for="the-file">Upload File</label> --}}
                </div>
            </div>
            <div class="card-footer bg-light">
                <a href="{{route('index')}}" class="text-decoration-none btn btn-outline-dark">Cancel</a>
                {{-- <button type="button" class="btn btn-outline-dark">Cancel</button> --}}
                <button type="submit" class="btn btn-dark">Save</button>
            </div>
          </div>
    </form>
@endsection
