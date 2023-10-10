@extends('students.layout')

@section('content')
<div class="container">

    <h2 class="text-center text-primary">Histori Tabungan {{ $student->name }}</h2>
    <table class="table table-striped table-hover">
        <thead class="thead-dark" style="background-color: #3586ff; color: white">
            <tr>
                <th>No</th>
                <th>Jumlah</th>
                <th>Saldo Sebelum</th>
                <th>Saldo Sesudah</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($histories as $history)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ number_format($history->jumlah, 0, ',', '.') }}</td>
                <td>{{ number_format($history->saldo_sebelum, 0, ',', '.') }}</td>
                <td>{{ number_format($history->saldo_sesudah, 0, ',', '.') }}</td>
                <td>{{ $history->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
