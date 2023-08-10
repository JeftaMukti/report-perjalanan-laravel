@extends('dashboard')

@section('content')

<div class="container">
    <h1>Edit Record</h1>

    <form action="{{ route('records.update', $record->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" class="form-control" name="date" id="date" value="{{$record->date}}" required>
        </div>

        <div class="form-group">
            <label for="time">Time:</label>
            <input type="time" class="form-control" name="time" id="time" value="{{$record->time}}" required>
        </div>

        <div class="form-group">
            <label for="location">Location:</label>
            <input type="text" class="form-control" name="location" id="location" value="{{$record->location}}" required>
        </div>

        <div class="form-group">
            <label for="temperature">Temperature:</label>
            <input type="number" step="1" class="form-control" name="temperature" id="temperature" value="{{ $record->temperature }}" required>
        </div>

        <button class="btn btn-primary" type="submit" >Update Record</button>
    </form>

    <a href="{{ route('records.index') }}" class="mt-3 btn btn-secondary">Back to Records</a>
</div>


@endsection
