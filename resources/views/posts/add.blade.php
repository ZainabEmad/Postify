@extends('layout.app')
@section('content')

<div class="col-8 mx-auto">

<form action="{{ route('store.post') }}" method="POST" class="form">
    @csrf

    @include('inc.message')

  <div class="mb-3">
    <label for="">Post Title</label>
    <input type="text" name="title" value="{{ old('title') }}"
    class="form-control @error('title') is-invalid @enderror" >
    </div>

    @error('title')
      <div class="alert alert-danger">{{ $message }}</div>
    @enderror

  <div class="mb-3">
    <label for="exampleFormControlSelect1">Writer</label>
    <select class="form-control @error('user_id') is-invalid @enderror" name="user_id">

      @foreach ($users as $user)
      <option value="{{ $user->id }}">{{ $user->name }}</option>
      @endforeach

    </select>
  </div>


  @error('user_id')
  <div class="alert alert-danger">{{ $message }}</div>
  @enderror

  <div class="mb-3">
    <label for="">Description</label>
    <textarea class="form-control @error('description') is-invalid @enderror" 
    rows="3" name="description">{{ old('description') }}</textarea>
  </div>
  @error('description')
  <div class="alert alert-danger">{{ $message }}</div>
  @enderror
  <div class="mb-3">
       <button type="submit" value="save" class="form-control bg-success">Save</button>
  </div>
</form>
</div>
@endsection