@extends('layout.app')
@section('content')

<div class="container">
    <div class="row">
        @if(session()->get('success') != null)
            <h5 class="text-success my-2">{{ session()->get('success') }}</h5>
        @endif

        <div class="col-12">
            <a href="{{ route('create.post') }}" class="btn btn-primary my-3">Add New Post</a>
            <h1 class="p-3 border text-center my-3">All Posts</h1>
        </div>
        <div class="col-12">
                <div class="card">
                    <table class="table table-pordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>writer</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                            <tr>
                                
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ Str::limit($post->description, 50) }}</td>
                                <td>{{ $post->user->name }}</td>

                                <td>
                                    <a href="{{ route('edit.post', $post->id) }}" class="btn btn-primary">Edit</a>
                                </td>
                                <td><form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                    @csrf
                                     @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
        </div>
        {{ $posts->links('pagination::bootstrap-5') }}
    </div>
</div>

@endsection

