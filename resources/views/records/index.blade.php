@extends('dashboard')

@section('content')
    <h1 class='container'>Laporan</h1>
    
    <th><a href="{{ route('records.index', ['sort_by' => 'date', 'sort_order' => $sortOrder === 'asc' ? 'desc' : 'asc']) }}">Date</a></th>
            <th><a href="{{ route('records.index', ['sort_by' => 'temperature', 'sort_order' => $sortOrder === 'asc' ? 'desc' : 'asc']) }}">Temperature</a></th>
            <th><a href="{{ route('records.index', ['sort_by' => 'time', 'sort_order' => $sortOrder === 'asc' ? 'desc' : 'asc']) }}">Time</a></th>
    <table class="table table-striped">
        <tr>
            <th>Date</th>
            <th>Time</th>
            <th>Location</th>
            <th>Temperature</th>
            <th>Action</th>
        </tr>
        @foreach($records as $record)
            <tr>
                <td>{{ $record->date }}</td>
                <td>{{ $record->time }}</td>
                <td>{{ $record->location }}</td>
                <td>{{ $record->temperature }}</td>
                <td>
                    <a href="{{ route('records.edit', $record->id) }}">Edit</a>
                    <form action="{{ route('records.destroy', $record->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this record?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <a href="{{ route('records.create') }}">Add New Record</a>
@endsection
