@extends('layout.app')
@section('content')

<div class="col-8 mx-auto">

<form action="{{ route('tags.store') }}" method="POST" class="form">
    @csrf

    @include('inc.message')

  <div class="mb-3">
    <label for="">TagName</label>
    <input type="text" name="name" value="{{ old('name') }}"
    class="form-control @error('name') is-invalid @enderror" >
  </div>

    @error('name')
      <div class="alert alert-danger">{{ $message }}</div>
    @enderror

  <div class="mb-3">
       <button type="submit" value="save" class="form-control bg-success">Save</button>
  </div>
</form>
</div>
@endsection