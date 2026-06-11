@extends('layouts.index')

@section('konten')
<div class="card p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Daftar Pengajuan Surat Kelurahan</h3>
        
        <!-- BUTTON TAMBAH: Mengarah ke rute surat.create -->
        <a href="{{ route('surat.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus-circle-notch mr-1"></i> Tambah Pengajuan Surat
        </a>
    </div>

    <!-- FLASH SESSION: Menampilkan notifikasi sukses setelah redirect -->
    @if(session('sukses'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="icon fas fa-check-circle mr-2"></i> {{ session('sukses') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="table-responsive mt-2">
        <table class="table table-striped table-bordered">
            <thead class="bg-light">
                <tr>
                    <th style="width: 5%">No</th>
                    <th>No Surat</th>
                    <th>Jenis Surat</th>
                    <th>Nama Pemohon</th>
                    <th>NIK Pemohon</th>
                    <th>Tanggal Ajuan</th>
                </tr>
            </thead>
            <tbody>
                @forelse($semuaSurat as $index => $s)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td><span class="@extends('layouts.index')

@section('content')
<div class="card p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Daftar Pengajuan Surat Kelurahan</h3>
        
        <!-- BUTTON TAMBAH: Mengarah ke rute surat.create -->
        <a href="{{ route('surat.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus-circle-notch mr-1"></i> Tambah Pengajuan Surat
        </a>
    </div>

    <!-- FLASH SESSION: Menampilkan notifikasi sukses setelah redirect -->
    @if(session('sukses'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="icon fas fa-check-circle mr-2"></i> {{ session('sukses') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="table-responsive mt-2">
        <table class="table table-striped table-bordered">
            <thead class="bg-light">
                <tr>
                    <th style="width: 5%">No</th>
                    <th>No Surat</th>
                    <th>Jenis Surat</th>
                    <th>Nama Pemohon</th>
                    <th>NIK Pemohon</th>
                    <th>Tanggal Ajuan</th>
                </tr>
            </thead>
            <tbody>
                @forelse($semuaSurat as $index => $s)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td><span class="badge badge-secondary">{{ $s->nomor_surat }}</span></td>
                    <td>{{ $s->jenis_surat }}</td>
                    <td><strong>{{ $s->penduduk->nama }}</strong></td>
                    <td>{{ $s->penduduk->nik }}</td>
                    <td>{{ \Carbon\Carbon::parse($s->tanggal_ajuan)->format('d-m-Y') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">Belum ada data pengajuan surat.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection">{{ $s->nomor_surat }}</span></td>
                    <td>{{ $s->jenis_surat }}</td>
                    <td><strong>{{ $s->penduduk->nama }}</strong></td>
                    <td>{{ $s->penduduk->nik }}</td>
                    <td>{{ \Carbon\Carbon::parse($s->tanggal_ajuan)->format('d-m-Y') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">Belum ada data pengajuan surat.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection