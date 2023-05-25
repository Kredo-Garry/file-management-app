@extends('layouts.app')

@section('title', 'Admin Users Page')

@section('content')
    <table class="table table-sm w-50 mx-auto table-hover align-middle bg-white border text-secondary text-center">
        <thead class="small table-success text-secondary">
            <tr>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>CREATED AT</th>
                <th>STATUS</th>
                <th>ACTION</th>
            </tr>
            <tbody>
                @foreach ($all_users as $user)
                    <tr>
                        <td>
                            <a href="#" class="text-decoration-none text-dark fw-bold">{{$user->name}}</a>
                        </td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>
                            <i class="fa-solid fa-circle text-success"></i> Active
                        </td>
                        <td>
                            @if (Auth::user()->id !== $user->id)
                                <div class="dropdown">
                                    <button class="btn btn-sm" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#deactivate-user">
                                            <i class="fa-solid fa-user-slash"></i> Deactivate {{$user->name}}
                                        </button>
                                    </div>
                                </div>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </thead>
    </table>
    <div class="d-flex justify-content-center">
        {{$all_users->links()}}
    </div>
@endsection
