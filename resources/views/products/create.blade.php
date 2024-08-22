@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Product</h1>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="summary">Summary</label>
            <textarea class="form-control" id="summary" name="summary"></textarea>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>
        <div class="form-group">
            <label for="flag">Flag</label>
            <input type="checkbox" id="flag" name="flag" value="1">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection