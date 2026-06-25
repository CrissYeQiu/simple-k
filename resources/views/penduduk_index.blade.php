@extends('layouts.index')

@section('judul', 'Kelurahan Maju Mundur')
 
@section('konten')
    <div class="card p-4">
        <h3>Data Penduduk</h3>
        <table class="table table-striped table-bordered mt-3">
            <thead>
                <tr>
                    <th>NIK</th>
                    <th>NAMA</th>
                    <th>JK</th>
                    <th>ALAMAT</th>
                </tr>
            </thead>
            <tbody>
            @foreach($warga as $item)
            <tr>
                <td>{{ $item->nik }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->jk }}</td>
                <td>{{ $item->alamat }}</td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
@endsection