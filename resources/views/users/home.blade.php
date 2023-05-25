@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-2">
            <ol class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-start">
                  <div class="ms-2 me-auto">
                    <div class="fw-bold">
                        <i class="fa-solid fa-wrench"></i> Dashboard
                    </div>
                  </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                  <div class="ms-2 me-auto">
                    <div class="fw-bold">
                        <i class="fa-solid fa-folder-tree"></i> Folders
                    </div>
                  </div>
                  <span class="badge bg-primary rounded-pill">14</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                  <div class="ms-2 me-auto">
                    <div class="fw-bold">
                        <i class="fa-solid fa-file-lines"></i> Files
                    </div>
                  </div>
                  <span class="badge bg-primary rounded-pill">14</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                      <div class="fw-bold">
                        <i class="fa-solid fa-key"></i> Change Password
                      </div>
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                      <div class="fw-bold">
                        <i class="fa-solid fa-left-long"></i> Logout
                      </div>
                    </div>
                </li>
              </ol>
        </div>
        <div class="col-md-10">
            @foreach ($all_files as $file)
            <div class="d-inline-flex">
                <div class="card mb-2" style="width: 20rem; height: 30rem">
                    <a href="{{route('file.show', $file->id)}}">
                        <img src="{{asset('storage/images/' . $file->the_file)}}" class="card-img-top img-md" style="width: 20rem; height: 20rem;">
                    </a>
                    <div class="card-body bg-white">
                        <p class="text-muted">{{$file->description}}</p>
                    </div>
                </div>
            </div>

            @endforeach
        </div>
    </div>
</div>
@endsection
