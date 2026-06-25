@extends('layouts.index')

@section('konten')
<div class="card p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Daftar Pengajuan Surat Kelurahan</h3>

        <a href="{{ route('surat.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus-circle-notch mr-1"></i> Tambah Pengajuan Surat
        </a>
    </div>

    @if(session('sukses'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('sukses') }}
        </div>
    @endif

    <div class="table-responsive mt-2">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No Surat</th>
                    <th>Jenis Surat</th>
                    <th>Nama Pemohon</th>
                    <th>NIK Pemohon</th>
                    <th>Tanggal Ajuan</th>
                    <th>Berkas Pengajuan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($semuaSurat as $index => $s)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        <span class="">
                            {{ $s->nomor_surat }}
                        </span>
                    </td>
                    <td>{{ $s->jenis_surat }}</td>
                    <td>{{ $s->penduduk->nama }}</td>
                    <td>{{ $s->penduduk->nik }}</td>
                    <td>{{ \Carbon\Carbon::parse($s->tanggal_ajuan)->format('d-m-Y') }}</td>
                    <td>
                        @if($s->berkas_pendukung)
                            @php
                                $ext = strtolower(pathinfo($s->berkas_pendukung, PATHINFO_EXTENSION));
                            @endphp

                            @if(in_array($ext, ['jpg', 'png']))
                                <a href="{{ asset('storage/' . $s->berkas_pendukung) }}" target="_blank">
                                    <img
                                        src="{{ asset('storage/' . $s->berkas_pendukung) }}"
                                        alt="Berkas Pendukung"
                                        class="rounded shadow-sm border"
                                        style="width: 58px; height: 58px; object-fit: cover;">
                                </a>
                            @elseif($ext === 'pdf')
                                <a href="{{ asset('storage/' . $s->berkas_pendukung) }}" target="_blank" class="btn btn-outline-danger btn-sm">
                                    Lihat PDF
                                </a>
                            @else
                                <span class="badge bg-secondary">File tersedia</span>
                            @endif
                        @else
                            <span class="badge bg-warning text-dark">Belum ada berkas</span>
                        @endif
                    </td>
                    <td>
                        <!-- Tombol Menuju cetak pdf -->
                        <div class="d-flex gap-1 flex-wrap">
                            <a href="{{ route('surat.cetak', $s->id) }}" class="btn btn-primary btn-sm" target="_blank">
                                Cetak PDF
                            </a>

                            <!-- Tombol Menuju Halaman Edit -->
                            <a href="{{ route('surat.edit', $s->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>

                            <!-- Tombol Hapus Menggunakan Form POST dengan Method Spoofing DELETE -->
                            <form action="{{ route('surat.destroy', $s->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data surat ini?')" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">
                        Belum ada data pengajuan surat.
                    </td>
                </tr>
                @endforelse
            </tbody>

    </div>
</div>
@endsection