@extends('layout.app')
@section('content')

<div class="container">
    <div class="row">
        
        @include('inc.message')

        <div class="col-12">
            @can('create', App\Models\Tag::class)
            <a href="{{ route('tags.create') }}" class="btn btn-primary my-3">Add New Tag</a>
            @endcan
            <h1 class="p-3 border text-center my-3">All Tags</h1>
        </div>
        <div class="col-12">
                <div class="card">
                    <table class="table table-pordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Posts</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tags as $tag)
                            <tr>
                                
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $tag->name }}</td>

                                 <td>
                                    @foreach($tag->posts as $post)
                                        <span class="badge bg-warning my-1">{{ $post->title }}</span>
                                        <br>
                                    @endforeach
                                </td>

                                <td>
                                    <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-info">Edit</a>
                                </td>
                                <td><form action="{{ route('tags.destroy', $tag->id) }}" method="POST">
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
        {{ $tags->links('pagination::bootstrap-5') }}
    </div>
</div>

@endsection

