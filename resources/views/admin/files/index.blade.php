@extends('layouts.app')

@section('title', 'Admin Files Page')

@section('content')
    <table class="table table-sm w-75 mx-auto table-hover align-middle bg-white border text-secondary text-center mt-2">
        <thead class="small table-success text-secondary">
            <tr>
                <th>MEMO NUMBER</th>
                <th>IMAGE</th>
                <th>NAME OF FILE</th>
                <th>DESCRIPTION</th>
                <th>STATUS</th>
                <th>ACTION</th>
            </tr>
            <tbody>
                @foreach ($all_files as $file)
                    <tr>
                        <td>
                            <a href="{{route('file.show', $file->id)}}" class="text-decoration-none text-dark fw-bold">{{$file->memo_number}}</a>
                        </td>
                        <td>
                            <a href="{{route('file.show', $file->id)}}">
                                <img src="{{asset('/storage/images/' . $file->the_file)}}" alt="{{$file->the_file}}" style="width: 200px; height: 200px;">
                            </a>
                        </td>
                        <td>{{$file->name_of_file}}</td>
                        <td>{{$file->description}}</td>
                        <td>
                            <i class="fa-solid fa-circle text-success"></i> Received
                        </td>
                        <td>
                            {{-- @if (Auth::user()->id !== $user->id) --}}
                                <div class="dropdown">
                                    <button class="btn btn-sm" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#hide-file">
                                            <i class="fa-solid fa-user-slash"></i> Hide {{$file->name}} File
                                        </button>
                                    </div>
                                </div>
                            {{-- @endif --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </thead>
    </table>
    <div class="d-flex justify-content-center">
        {{$all_files->links()}}
    </div>
@endsection
