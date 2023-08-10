@extends('dashboard')

@section('content')
    <h1 class='container'>Laporan</h1>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
            <p>{{$message}}</p>
    </div>
    @endif
    <div class="container">
        <table class="table table-striped">
            <tr>
                <th><a class="mb-2 mt-3 btn btn-success" href="{{ route('records.index', ['sort_by' => 'date', 'sort_order' => $sortOrder === 'asc' ? 'desc' : 'asc']) }}">Date</a></th>
                <th><a class="mb-2 mt-3 btn btn-secondary" href="{{ route('records.index', ['sort_by' => 'temperature', 'sort_order' => $sortOrder === 'asc' ? 'desc' : 'asc']) }}">Temperature</a></th>
                <th><a class="mb-2 mt-3 btn btn-info" href="{{ route('records.index', ['sort_by' => 'time', 'sort_order' => $sortOrder === 'asc' ? 'desc' : 'asc']) }}">Time</a></th>
                <br>
                <th>Location</th>
                <th>Action</th>
            </tr>
            @foreach($records as $record)
                <tr>
                    <td>{{ $record->date }}</td>
                    <td>{{ $record->temperature }}</td>
                    <td>{{ $record->time }}</td>
                    <td>{{ $record->location }}</td>
                    <td>
                        <a class=" mb-2 mt-3 btn btn-secondary" href="{{ route('records.edit', $record->id) }}">Edit</a>
                        <form action="{{ route('records.destroy', $record->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

        <div class="d-flex justify-content-center">
            {{ $records->links('pagination::bootstrap-4') }}
        </div>

        <a class="mt-3 btn btn-dark" href="{{ route('records.create') }}">Add New Record</a>
    </div>  
@endsection
