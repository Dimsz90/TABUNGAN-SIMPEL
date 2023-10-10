@extends('students.layout')
@section('content')

@php
    
    $total = 0;
@endphp

    
      
<div class="container">
    
    <div class="row" style="margin: 20px;">
        
        <div class="col-12">
            <div class="card" style="border: #3586ff; border-color: #000000" >
                
                <div class="card-header" style="background-color: #3586ff; color: white;">
                    
                    <h2>Tabungan</h2>
                </div>
                <div class="card-body" style="opacity: initial" >
                    <a href="{{ url('/student/create') }}" class="btn btn-success btn-sm" title="Add New Student"
                        style="background-color: #3586ff; border-color: #000000;">
                        Tambah data
                    </a>
                    <br />
                    <br />
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th>Jumlah</th>
                                    <th>Tanggal</th>
                                    <th>Nomor Telepon</th> 
                                    <th>Actions</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($students as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->kelas }}</td>
                                    <td>{{ number_format($item->jumlah, 0, ',', '.') }}</td>
                                    <td>{{ $item->tanggal }}</td>
                                    <td>{{ $item->nomor_telepon }}</td>

                                   
                                    

                                    <td>
                                        <a href="{{ url('/student/' . $item->id) }}" title="View Student"><button
                                                class="btn btn-secondary btn-sm"><i class="fa fa-eye"
                                                    aria-hidden="true"></i> View</button></a>
                                        <a href="{{ url('/student/' . $item->id . '/edit') }}"
                                            title="Edit Student"><button class="btn btn-primary btn-sm"><i
                                                    class="fa fa-pencil-square-o"
                                                    aria-hidden="true"></i> Edit</button></a>

                                        <form method="POST" action="{{ url('/student' . '/' . $item->id) }}"
                                            accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                title="Delete Student"
                                                onclick="return confirm('Confirm delete?')"><i class="fa fa-trash-o"
                                                    aria-hidden="true"></i> Delete</button>
                                                   
                                                   
                                        </form>
                                        <a href="{{ url('/student/' . $item->id . '/history') }}" title="View History"><button class="btn btn-info btn-sm"><i class="fa fa-history" aria-hidden="true"></i>History Tabungan</button></a>


                                    </td>
                                </tr>
                                @php
                                if (is_numeric($item->jumlah)) {
                                $total += $item->jumlah;
                                }
                                @endphp
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                   

                </div>
            </div>
        </div>
    </div>
    
</div>

<div class="container" style="margin-block-start: 20px;">
    <div class="row justify-content-center
    ">
        <div class="col-md-4">
            <div class="card" style="border: #3586ff">
                <div class="card-body" style="background-color: #3586ff; border-color:#3586ff; color: white;">
                    <h5 class="card-title">Total : </h5>
                    <p class="card-text" style="font-size: 20px; font-weight: bold;">{{ number_format($total, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

    </section>
@endsection






