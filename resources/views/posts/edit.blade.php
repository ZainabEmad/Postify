@extends('layout.app')
@section('content')

<div class="col-8 mx-auto">

<form action="{{ route('posts.update', $post->id) }}" class="form" method="POST">
  @csrf
  @method('PUT')

  <div class="mb-3">
    <label for="" >Post Title</label>
    <input type="text" value="{{ $post->title }}" name="title"
    class="form-control">
    

  <div class="mb-3">
    <label for="">Description</label>
    <textarea class="form-control" id="" rows="3" name="description">{{ $post->description }}</textarea>
  </div>
  <div class="mb-3">
       <button type="submit" value="save" class="form-control bg-success">Save</button>
  </div>
</form>
</div>
@endsection