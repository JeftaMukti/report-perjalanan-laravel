@extends('dashboard')

@section('content')
    <h1>Edit Record</h1>

    <form action="{{ route('records.update', $record->id) }}" method="post">
        @csrf
        @method('PUT')

        <label for="date">Date:</label>
        <input type="date" name="date" id="date" value="{{ $record->date }}" required><br>

        <label for="time">Time:</label>
        <input type="time" name="time" id="time" value="{{ $record->time }}" required><br>

        <label for="location">Location:</label>
        <input type="text" name="location" id="location" value="{{ $record->location }}" required><br>

        <label for="temperature">Temperature:</label>
        <input type="number" step="0.01" name="temperature" id="temperature" value="{{ $record->temperature }}" required><br>

        <button type="submit" >Update Record</button>
    </form>

    <a href="{{ route('records.index') }}">Back to Records</a>
@endsection
