@extends('layout.app')
@section('content')

<div class="col-8 mx-auto">

<form action="{{ route('users.store') }}" method="POST" class="form">
    @csrf

    @include('inc.message')

  <div class="mb-3">
    <label for="">UserName</label>
    <input type="text" name="name" value="{{ old('name') }}"
    class="form-control @error('name') is-invalid @enderror" >
  </div>

    @error('name')
      <div class="alert alert-danger">{{ $message }}</div>
    @enderror

   <div class="mb-3">
    <label for="">User Email</label>
    <input type="text" name="email" value="{{ old('email') }}"
    class="form-control @error('email') is-invalid @enderror" >
  </div>

    @error('email')
      <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="mb-3">
    <label for="">Password</label>
    <input type="password" name="password" value="{{ old('password') }}"
    class="form-control @error('password') is-invalid @enderror" >
  </div>

    @error('password')
      <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    
    <select name="type" class="form-control @error('type') is-invalid @enderror">
      <option value="admin">Admin</option>
      <option value="writer">Writer</option>
    </select>
    
    @error('type')
      <div class="alert alert-danger">{{ $message }}</div>
    @enderror

  <div class="mb-3">
       <button type="submit" value="save" class="form-control bg-success">Save</button>
  </div>
</form>
</div>
@endsection