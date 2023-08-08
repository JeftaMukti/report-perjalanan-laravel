@extends('dashboard')

@section('content')
<div class="container">
    <h1>Add New Record</h1>

    <form action="{{ route('records.store') }}" method="post">
        @csrf
        <label for="date">Date:</label>
        <input type="date" name="date" id="date" required><br>

        <label for="time">Time:</label>
        <input type="time" name="time" id="time" required><br>

        <label for="location">Location:</label>
        <input type="text" name="location" id="location" required><br>

        <label for="temperature">Temperature:</label>
        <input type="number" step="1" name="temperature" id="temperature" required><br>

        <button type="submit">Add Record</button>
    </form>

    <a href="{{ route('records.index') }}">Back to Records</a>
    </div>
@endsection
