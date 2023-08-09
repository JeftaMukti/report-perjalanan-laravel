@extends('dashboard')
@section('content')
<div class="container">
<div class="card">
  <div class="card-header">
    Report
  </div>
  <div class="card-body">
    <h5 class="card-title">Selamat Datang {{$name}} On Report Perjalanan Web</h5>
    <p class="card-text">With supporting Record Your Journey.</p>
    <a href="{{ route('records.index') }}" class="btn btn-primary">Go Report</a>
  </div>
</div>
</div>
@endsection