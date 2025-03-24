@extends('layouts.app')
@section("title", $viewData["title"])
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Create User</div>
        <div class="card-body">
          <form method="POST" action="{{ route('admin.user.store') }}">
            @csrf
            <input type="text" class="form-control mb-2" placeholder="Enter name" name="name" value="{{ old('name') }}" required/>
            <input type="email" class="form-control mb-2" placeholder="Enter email" name="email" value="{{ old('email') }}" required/>
            <input type="password" class="form-control mb-2" placeholder="Enter password" name="password" required/>
            <input type="password" class="form-control mb-2" placeholder="Confirm password" name="password_confirmation" required/>
            <input type="submit" class="btn btn-success" value="Create" />
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
