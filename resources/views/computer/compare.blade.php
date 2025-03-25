<!-- Developed by Valeria Corrales Hoyos -->
@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
    <div class="container mt-4">
        <h2 class="text-center mb-4">Computer Comparison</h2>
        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <thead class="table-dark">
                    <tr>
                        <th class="bg-secondary text-white">Attribute</th>
                        @foreach ($viewData["computers"] as $computer)
                            <th class="bg-primary text-white">{{ $computer->getName() }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="fw-bold">Brand</td>
                        @foreach ($viewData["computers"] as $computer)
                            <td>{{ $computer->getBrand() }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td class="fw-bold">Type</td>
                        @foreach ($viewData["computers"] as $computer)
                            <td>{{ ucfirst($computer->getType()) }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td class="fw-bold">Description</td>
                        @foreach ($viewData["computers"] as $computer)
                            <td>{{ $computer->getDescription() }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td class="fw-bold">Price</td>
                        @foreach ($viewData["computers"] as $computer)
                            <td>{{ $computer->getPrice() }}</td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="text-center mt-3">
            <a href="{{ route('computer.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
@endsection
