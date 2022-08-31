@extends('layouts.layout')
@section('title','create')
@section('nav')
    @parent
    <li class="nav-item">
        <a class="nav-link active" href=" {{ route("dashboard")}} ">Dashboard</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href=" {{ route("category.index")}} ">Category</a>
    </li>
@stop
@section('content')
    <div class="container">
        <h1 class="text-center"> Edit Category </h1>
        <form action=" {{ route('category.update' , $category->slug ) }} " method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="name" value=" {{ $category->name }} ">
                <div id="name" class="form-text text-danger">
                    @error('name')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
@stop
