@extends('layouts.app')
@section('content')
<div class="container">
    <center><h1>{{ $tittle }}</h1></center>  
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if($errors->any())
        <div class="alert alert-warning">{{$errors->first()}}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Summary</th>
                <th>Image</th>
                <th>Flag</th>
                <th>CTA</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->summary }}</td>
                    <td>
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="100">
                        @endif
                    </td>
                    <td>{{ $product->flag ? 'Yes' : 'No' }}</td>
                    <td>
                        <form action="{{ route('storePlugin') }}" method="POST" style="display:inline-block;">
                            @csrf        
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button type="submit" class="btn btn-sm btn-success">CTA</button>                  
                        </form>                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection