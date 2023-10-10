@extends('students.layout')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header" style="background-color: #3586ff; color: white;" >Tabungan</div>
  <div class="card-body">
        <div class="card-body">
        <p class="card-title" style="color: #1b2b1b;" >Nama : {{ $student->name }}</p>
        <p class="card-title" style="color: #1b2b1b;">Kelas : {{ $student->kelas }}</p>
        <p class="card-title" style="color: #1b2b1b;">Jumlah : {{ number_format($student->jumlah, 0, ',', '.') }}</p>
        <p class="card-title" style="color: #1b2b1b;">Tanggal Masuk : {{ $student->tanggal }}</p>
        <p class="card-title" style="color: #1b2b1b;">Nomor Handphone : {{ $student->nomor_telepon }}</p>
  </div>

  </div>
</div>  