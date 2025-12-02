@extends('layout.app')
@section('content')

<div class="col-8 mx-auto">

<form action="{{ route('users.update', $user->id) }}" class="form" method="POST">
  @csrf
  @method('PUT')

  <div class="mb-3">
    <label for="" >UserName</label>
    <input type="text" value="{{ $user->name }}" name="name"
    class="form-control">
    
    <div class="mb-3">
    <label for="" >Email</label>
    <input type="email" value="{{ $user->email }}" name="email"
    class="form-control">

    <div class="mb-3">
    <label for="" >Password</label>
    <input type="password" value="{{ $user->password }}" name="password"
    class="form-control">

     <select name="type" class="form-control">
      <option @selected($user->type == 'admin') value="admin">Admin</option>
      <option @selected($user->type == 'writer') value="writer">Writer</option>
    </select>


  <div class="mb-3">
       <button type="submit" value="save" class="form-control bg-success">Save</button>
  </div>
</form>
</div>
@endsection