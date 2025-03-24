@extends('layouts.admin')
@section("title", $viewData["title"])
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Edit User</div>
        <div class="card-body">
          <form method="POST" action="{{ route('admin.user.update', ['id' => $viewData['user']->getId()]) }}">
            @csrf
            @method('PUT')
            <input type="text" class="form-control mb-2" placeholder="Enter name" name="name" value="{{ old('name', $viewData['user']->getName()) }}" required/>
            <div class="form-check mb-2">
              <input type="checkbox" class="form-check-input" name="is_admin" id="is_admin" {{ old('is_admin', $viewData['user']->getIsAdmin()) ? 'checked' : '' }}>
              <label class="form-check-label" for="is_admin">Admin</label>
            </div>
            <input type="submit" class="btn btn-success" value="Update" />
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
