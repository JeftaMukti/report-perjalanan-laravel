@extends('dashboard')

@section('content')
<div class="container">
    <h1>Add New Record</h1>

    <form action="{{ route('records.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" class="form-control" name="date" id="date" required>
        </div>

        <div class="form-group">
            <label for="time">Time:</label>
            <input type="time" class="form-control" name="time" id="time" required>
        </div>

        <div class="form-group">
            <label for="location">Location:</label>
            <input type="text" class="form-control" name="location" id="location" required>
        </div>

        <div class="form-group">
            <label for="temperature">Temperature:</label>
            <input type="number" step="1" class="form-control" name="temperature" id="temperature" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Record</button>
    </form>

    <a href="{{ route('records.index') }}" class="mt-3 btn btn-secondary">Back to Records</a>
</div>
@endsection
