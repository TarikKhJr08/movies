@extends('layouts.layout')
@section('title','create')
@section('nav')
    @parent
    <li class="nav-item">
        <a class="nav-link active" href=" {{ route("dashboard")}} ">Dashboard</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href=" {{ route('post.index') }}">Post</a>
    </li>
@stop
@section('content')
    <div class="container">
        <h1 class="text-center"> Create New Posts </h1>
        <form action=" {{ route('post.store') }} " method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Post Name</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="name" value=" {{ old('name') }} ">
                <div id="name" class="form-text text-danger">
                    @error('name')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" aria-label="Default select example" name="category">
                    <option selected></option>
                    @foreach ($categories as $category)
                        <option value=" {{ $category->id }} ">{{ $category->name }}</option>
                    @endforeach
                </select>
                <div id="category" class="form-text text-danger">
                    @error('category')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" id="description" name="description" aria-describedby="description" value=" {{ old('description') }} ">
                <div id="description" class="form-text text-danger">
                    @error('description')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Saisir image de Post</label>
                <input class="form-control" name="image" type="file" id="image">
                @error('image')
                <div id="image" class="form-text text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@stop
