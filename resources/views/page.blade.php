@extends('dashboard')
@section('content')
<div class="container">
    <h3>Report Perjalan</h3>
    <div class="form">
        <p>Selamat Datang {{$name}} On Report Perjalanan Web</p>
        <br>
        <a href="{{ route('records.index') }}">go to Report</a>
    </div>
</div>
@endsection