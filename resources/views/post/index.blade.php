@extends('layouts.layout')
@section('title','post')
@section('content')

@section('nav')

    @parent

    <li class="nav-item">
        <a class="nav-link active" href=" {{ route('dashboard') }} ">Dashboard</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href=" {{ route('post.create') }} ">Create</a>
    </li>

@stop

    <div class="container">
        <h1 class="text-center my-4">Post List</h1>
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
                        <th scope="col">Slug</th>
                        <th scope="col">Description</th>
                        <th scope="col">Category</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <th scope="row">{{ $post->id }}</th>
                            <td>{{ $post->name }}</td>
                            <td>{{ $post->slug }}</td>
                            <td>{{ $post->description }}</td>
                            {{-- <td>{{ $post-> }}</td> --}}
                            <td class="flex">
                                    <a href=" {{ route('post.edit' , $post->slug) }} " class="btn btn-warning py-1 px-2">Edit</a>

                                    <a class="btn btn-danger py-1 px-2 disabled"
                                            onclick=" event.preventDefault();
                                                    if(confirm('you are sure!!!'))
                                                        document.getElementById('form').submit();
                                    ">Delete
                                    </a>

                                    <form action=" {{ route('post.destroy' , $post->slug)}} " method="post" id="form">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
