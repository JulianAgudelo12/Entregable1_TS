@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])

@section('content')
<table class="table table-bordered text-center">
    <thead>
        <tr>
            <th>Attribute</th>
            @foreach ($viewData['computers'] as $computer)
                <th>{{ $computer->getName() }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($viewData['comparisonData'] as $row)
            <tr>
                <td class="fw-bold">{{ $row['label'] }}</td>
                @foreach ($row['values'] as $value)
                    <td>{{ $value }}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
@endsection