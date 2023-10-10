@extends('students.layout')
@section('content')

<div class="card" style="margin:20px;">
  <div class="card-header" style="background-color: #3586ff; color: white;">Buat tabungan baru</div>
  <div class="card-body">
    <form action="{{ url('student') }}" method="post" onsubmit="return validateForm()">
      {!! csrf_field() !!}
      <label style="color: #3586ff;">Nama</label></br>
      <input type="text" name="name" id="name" class="form-control" placeholder="Masukan Nama" required></br>
      <label style="color: #3586ff;">kelas</label></br>
      <input type="text" name="kelas" id="kelas" class="form-control" placeholder="Masukan Kelas" required></br>
      <label style="color: #3586ff;">jumlah</label></br>
      <input type="number" name="jumlah" id="jumlah" class="form-control" placeholder="Masukan Jumlah" required></br>

      <label style="color: #3586ff;">tanggal masuk</label></br>
      <input type="date" name="tanggal" id="tanggal" class="form-control" required></br>
      <label style="color: #3586ff;">Nomor Telepon</label></br>
<div class="input-group">
  <div class="input-group-prepend"><span class="input-group-text" id="basic-addon1">+62</span>
  </div>
  <input type="number" name="nomor_telepon" id="nomor_telepon" class="form-control" placeholder="e.g : 8123456789" required>
</div>
      <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
  </div>
</div>



  
@endsection
