@extends('layout.app')
@section('content')

  <div class="col-8 mx-auto">

  <form action="{{ route('store.post') }}" method="POST" class="form" enctype="multipart/form-data">
      @csrf

      @include('inc.message')

    <div class="mb-3">
      <label for="" class="form-label fw-semibold" >Post Title</label>
      <input type="text" name="title" value="{{ old('title') }}"
      class="form-control @error('title') is-invalid @enderror" >
      </div>

      @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror

    <div class="mb-3">
      <label for="exampleFormControlSelect1" class="form-label fw-semibold">Writer</label>
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
      <label for="" class="form-label fw-semibold">Description</label>
      <textarea class="form-control @error('description') is-invalid @enderror" 
      rows="3" name="description">{{ old('description') }}</textarea>
    </div>
    @error('description')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="mb-3">
      <label for="" class="form-label fw-semibold" >Tags</label>
      <select name="tags[]" multiple class="form-select @error('tags') is-invalid @enderror"
            style="height: 150px;">
          @foreach ($tags as $tag)
          <option value="{{ $tag->id }}"> {{ $tag->name }} </option>
          @endforeach
      </select>

      @error('tags')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-3">
      <label for=""class="form-label fw-semibold">Image</label>
      <input class="form-control @error('image') is-invalid @enderror" 
      rows="3" type="file" name="image">
    </div>
    
    @error('image')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="mb-3">
        <button type="submit" value="save" class="form-control bg-success">Save</button>
    </div>
  </form>
  </div>
  @endsection