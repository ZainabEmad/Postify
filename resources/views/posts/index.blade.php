@extends('layout.app')
@section('content')

<div class="container">
    <div class="row">

        @include('inc.message')

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
                                <th>Image</th>
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
                                    <img src="{{$post->image() }}" alt="" 
                                    class="rounded-circle shadow" width="150" height="150" style="object-fit: cover;"></img>
                                </td>

                                 <td>
                                    <a href="{{ route('edit.post', $post->id) }}" class="btn btn-primary">Edit</a>
                                </td>

                                <td><form action="{{ route('users.destroy', $post->id) }}" method="POST">
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

