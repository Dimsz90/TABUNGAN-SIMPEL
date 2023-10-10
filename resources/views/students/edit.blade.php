@extends('students.layout')
@section('content')

<div class="card" style="margin:20px;">
    <div class="card-header" title="Edit Student" style="background-color: #3586ff; border-color: #ffffff; color:rgb(255, 255, 255);">
        <h2>Tambah Tabungan</h2>
    </div>
    <div class="card-body">
        <form action="{{ url('student/' .$students->id) }}" method="post">
            {!! csrf_field() !!}
            @method("PATCH")
            <input type="hidden" name="id" id="id" value="{{$students->id}}" />
            <label>Nama</label><br>
            <input type="text" name="name" id="name" value="{{$students->name}}" class="form-control" readonly><br>
            <label>Kelas</label><br>
            <input type="text" name="kelas" id="kelas" value="{{$students->kelas}}" class="form-control" readonly><br>
            <label>Tabungan yang ada</label><br>
            <input type="number" name="jumlah" id="jumlah" value="{{$students->jumlah}}" class="form-control" readonly><br>
            <label>Tanggal</label><br>
            <input type="date" name="tanggal" id="tanggal" value="{{$students->tanggal}}" class="form-control"><br>
            <label>Nomor telepon</label><br>
            <input type="number" name="nomor_telepon" id="nomor_telepon" value="{{$students->nomor_telepon}}" class="form-control" readonly ><br>
            <label>Tambah Jumlah</label><br>
            <input type="number" name="tambah_jumlah" id="tambah_jumlah" class="form-control"><br>
            <label>Kurangi Jumlah</label><br>
<input type="number" name="kurangi_jumlah" id="kurangi_jumlah" class="form-control"><br>

<label>Alasan</label><br>
<div id='alasan_form' style='display:none;'>
    <textarea name='alasan' id='alasan' class='form-control' placeholder='Alasan mengurangi jumlah  (Mau top up lu ya)'></textarea><br>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tambahJumlahInput = document.getElementById('tambah_jumlah');
        const kurangiJumlahInput = document.getElementById('kurangi_jumlah');
        const alasanForm = document.getElementById('alasan_form');

        tambahJumlahInput.addEventListener('input', function() {
            if (this.value !== '') {
                kurangiJumlahInput.setAttribute('disabled', 'disabled');
                alasanForm.style.display = 'none';
            } else {
                kurangiJumlahInput.removeAttribute('disabled');
                alasanForm.style.display = 'none';
            }
        });

        kurangiJumlahInput.addEventListener('input', function() {
            if (this.value !== '') {
                tambahJumlahInput.setAttribute('disabled', 'disabled');
                alasanForm.style.display = 'block';
            } else {
                tambahJumlahInput.removeAttribute('disabled');
                alasanForm.style.display = 'none';
            }
            
        });
    });

</script>

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
 <input type="submit" value="Enter" style="background-color: #3586ff"><br>

        </form>
    </div>
</div>

@stop
