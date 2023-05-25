@extends('layouts.app')

@section('title', 'File Search')

@section('content')
<div class="row justify-content-center">
    <div class="col-auto">
        <p class="text-muted mb-4">Search Results for "<span class="fw-bold">{{$search}}</span>"</p>
        @forelse ( $files as $file)
            <div class="row align-items-center mb-3">
                <div class="col-auto d-flex align-items-center">
                    <a href="{{route('file.show', $file->id)}}" class="text-decoration-none"><p class="text-muted fw-bold me-3">Memo Number: {{$file->memo_number}}</p></a>
                    <a href="{{route('file.show', $file->id)}}" class="text-decoration-none"><p class="text-muted me-3">{{$file->name_of_file}}</p></a>
                    <a href="{{route('file.show', $file->id)}}" class="text-decoration-none"><p class="text-muted me-3"><span class="bg-dark text-white rounded p-1">{{$file->status}}</span></p></a>
                </div>
            </div>
        @empty
            <p class="lead text-muted text-center">No users found.</p>
        @endforelse
    </div>
</div>
@endsection
