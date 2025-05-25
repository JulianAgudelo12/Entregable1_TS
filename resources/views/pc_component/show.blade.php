<!-- Developed by Julián Agudelo Cifuentes -->

@extends('layouts.app')

@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])

@section('content')
  @include('components.detail-card', [
    'image' => $viewData['image'],
    'name' => $viewData['name'],
    'attributes' => $viewData['attributes']
  ])
@endsection
