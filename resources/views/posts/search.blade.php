@extends('layout.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="p-3 border text-center my-3">All Posts</h1>
            </div>
            @foreach ($posts as $post)
            
            <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            {{ $post->user->name }} - {{ $post->created_at->format('y-m-d') }}
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ Str::limit($post->description, 50) }}</p>
                            <a href="{{ route('details.post', $post->id) }}" class="btn btn-primary">Go somewhere</a>
                        </div>
                        </div>
            </div>
            
            @endforeach
        </div>
    </div>

    @endsection