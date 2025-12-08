@extends('layout.app')
@section('content')

<div class="col-8 mx-auto">

<form action="{{ route('posts.update', $post->id) }}" class="form" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')

  <div class="mb-3">
    <label for="" class="form-label fw-semibold" >Post Title</label>
    <input type="text" value="{{ $post->title }}" name="title"
    class="form-control">
  </div>

  <div class="mb-3">
      <label  class="form-label fw-semibold" >Writer</label>
      <select class="form-control" name="user_id">
        @foreach ($users as $user)
        <option @selected($user->id == $post->user_id) value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
      </select>
    </div>

  <div class="mb-3">
      <label for="" class="form-label fw-semibold" >Tags</label>
     
      <select name="tags[]" multiple class="form-control" style="height: 150px;">
       @foreach ($tags as $tag)
        <option  @if($post->tags->contains($tag)) selected @endif  value="{{ $tag->id }}">{{ $tag->name }}</option>  
       @endforeach
      </select>
      </div>
  

  <div class="mb-3">
    <label for="" class="form-label fw-semibold" >Description</label>
    <textarea class="form-control" id="" rows="3" name="description">{{ $post->description }}</textarea>
  </div>

   <div class="mb-3">
      <label for=""class="form-label fw-semibold">Image</label>
      <input class="form-control" rows="3" type="file" name="image">
    </div>

  <div class="mb-3">
       <button type="submit" value="save" class="form-control bg-success">Save</button>
  </div>
</form>
</div>
@endsection