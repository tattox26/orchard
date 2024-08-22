@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Settings page</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if($errors->any())
        <div class="alert alert-warning">{{$errors->first()}}</div>
    @endif
    <form action="{{ route('settings.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Tittle</label>
            <input type="text" class="form-control" id="tittle" name="tittle" value="{{ $setting->tittle }}" required>
        </div>
        <div class="form-group">
            <label for="summary">Name Admin</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $setting->name }}"  required>
        </div> 
        <div class="form-group">
            <label for="summary">Email Admin</label>
            <input type="text" class="form-control" id="email" name="email" value="{{ $setting->email }}"  required>
        </div><br>        
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection