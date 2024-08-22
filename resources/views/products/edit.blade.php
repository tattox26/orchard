@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Product</h1>

    <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
        </div>
        <div class="form-group">
            <label for="summary">Summary</label>
            <textarea class="form-control" id="summary" name="summary">{{ $product->summary }}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="100">
            @endif
            <input type="file" class="form-control-file" id="image" name="image">
        </div>
        <div class="form-group">
            <label for="flag">Flag</label>
            <input type="checkbox" id="flag" name="flag" value="1" {{$product->flag  ? 'checked' : '' }}>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection