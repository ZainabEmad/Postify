@extends('layout.app')
@section('content')

<div class="col-8 mx-auto">

<form action="{{ route('tags.update', $tag->id) }}" class="form" method="POST">
  @csrf
  @method('PUT')

  <div class="mb-3">
    <label for="" >TagName</label>
    <input type="text" value="{{ $tag->name }}" name="name"
    class="form-control">

  <div class="mb-3">
       <button type="submit" value="save" class="form-control bg-success">Save</button>
  </div>
</form>
</div>
@endsection