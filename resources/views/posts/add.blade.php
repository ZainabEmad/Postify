@extends('layout.app')
@section('content')

<div class="col-8 mx-auto">

<form action="{{ route('store.post') }}" method="POST" class="form">
    @csrf

    @if(session()->get('success') != null)
    <h5 class="text-success my-2">{{ session()->get('success') }}</h5>
    @endif

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
      <option value="1" {{ old('user_id') == 1 ? 'selected' : '' }}>zainab</option>
      <option value="2" {{ old('user_id') == 2 ? 'selected' : '' }}>hala</option>
      <option value="3" {{ old('user_id') == 3 ? 'selected' : '' }}>sara</option>
      <option value="4" {{ old('user_id') == 4 ? 'selected' : '' }}>hoda</option>
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