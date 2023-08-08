@extends('dashboard')

@section('content')
    <h1>Record Details</h1>

    <p><strong>Date:</strong> {{ $record->date }}</p>
    <p><strong>Time:</strong> {{ $record->time }}</p>
    <p><strong>Location:</strong> {{ $record->location }}</p>
    <p><strong>Temperature:</strong> {{ $record->temperature }}</p>

    <a href="{{ route('records.index') }}">Back to Records</a>
@endsection
