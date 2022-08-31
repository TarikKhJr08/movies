@extends('layouts.layout')
@section('title','user')
@section('content')
@section('nav')

    @parent

    <li class="nav-item">
        <a class="nav-link active" href=" {{ route('dashboard') }} ">Dashboard</a>
    </li>
@stop

    <div class="container">
        <h1 class="text-center my-4">Category List</h1>
        @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session()->get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="table-responsive w-75 mx-auto my-5">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="flex">
                                @if ($user->is_admin)
                                <a class="btn  py-1 px-2 disabled">Admin</a>
                                @else

                                <a class="btn btn-primary py-1 px-2"
                                onclick=" event.preventDefault();
                                        if(confirm('you are sure !!!'))
                                            document.getElementById('form').submit();
                                ">Admin
                                </a>
                                <form action=" {{ route('user.update' , $user->id) }} " method="post" id="form">
                                    @csrf
                                    @method('PUT')
                                </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>



@stop
