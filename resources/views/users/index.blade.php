@extends('layout.app')
@section('content')

<div class="container">
    <div class="row">
        
        @include('inc.message')

        <div class="col-12">
            <a href="{{ route('users.create') }}" class="btn btn-primary my-3">Add New User</a>
            <h1 class="p-3 border text-center my-3">All Users</h1>
        </div>
        <div class="col-12">
                <div class="card">
                    <table class="table table-pordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Type</th>
                                <th>Posts</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{!! $user->type() !!}</td>

                                 <td>
                                    <a href="{{ route('user.posts', $user->id) }}" class="btn btn-primary">Show</a>
                                </td>

                                <td>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info">Edit</a>
                                </td>
                                <td><form action="{{ route('users.destroy', $user->id) }}" method="POST">
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
        {{ $users->links('pagination::bootstrap-5') }}
    </div>
</div>

@endsection

