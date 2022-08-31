@extends('layouts.layout')
@section('title','category')
@section('content')

@section('nav')

    @parent

    <li class="nav-item">
        <a class="nav-link active" href=" {{ route('dashboard') }} ">Dashboard</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href=" {{ route('category.create') }} ">Create</a>
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
                        <th scope="col">Slug</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <th scope="row">{{ $category->id }}</th>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td class="flex">
                                    {{-- <a href=" {{ route('category.edit' , $category->slug) }} " class="btn btn-warning py-1 px-2">Edit</a> --}}

                                    <form  id="form" action=" {{ route('category.destroy' , $category->slug)}} " method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href=" {{ route('category.edit' , $category->slug) }} " class="btn btn-warning py-1 px-2">Edit</a>
                                        <button type="submit" class="btn btn-danger py-1 px-2">delete </button>
                                    </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>



@stop
