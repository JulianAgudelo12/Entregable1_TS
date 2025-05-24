@extends('layouts.app')

@section('title', $title)
@section('subtitle', $subtitle)

@section('content')
  @include('components.detail-card', [
    'image' => $image,
    'name' => $name,
    'attributes' => $attributes
  ])
@endsection
