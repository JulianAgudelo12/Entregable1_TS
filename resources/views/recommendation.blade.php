<!-- Developed by Santiago Rodriguez Mojica -->
@extends('layouts.app')

@section('title', 'Recommendation')
@section('subtitle', '')

@section('content')
<div class="container my-5">
    <form action="{{ route('recommend.store') }}" method="POST">
    @csrf
        <div class="mb-3">
            <label for="question" class="form-label">
                ¿Para qué fines desea utilizar el computador?
            </label>
            <textarea id="question" name="question" class="form-control" rows="3" required>
                {{ old('question') }}
            </textarea>
        </div>
        <button type="submit" class="btn btn-primary">Get Recommendation</button>
    </form>

    @isset($answer)
    <div class="mt-4">
        <h4>Answer</h4>
        <p>{{ $answer }}</p>
    </div>
    @endisset
</div>
@endsection