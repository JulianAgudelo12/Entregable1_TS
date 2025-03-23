@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
    <h2>Welcome to your Admin Dashboard</h2>
    <p>Total Users: {{ $viewData["totalUsers"] }}</p>
    <a href="{{ route('admin.user.index') }}" class="btn btn-primary">Manage Users</a>
@endsection

