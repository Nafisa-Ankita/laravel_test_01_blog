@extends('backend.layout.master')
@section('content')
<div class="row">
    {{-- Option 01 --}}
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="col-md-6">
        <h1>Create Category</h1>
        <form action="{{ route('categories.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Category Name">
            </div>
            {{-- Option 02 --}}
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="form-group">
                <label for="description">Category Description</label>
                <input type="text" class="form-control" id="description" name="description" placeholder="Category Description">
            </div>
            @error('description')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="form-group">
                <input type="submit" class="btn btn-success" value="submit">
            </div>
        </form>
    </div>
</div>
@endsection

    