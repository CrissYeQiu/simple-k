<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="card p-4">
        <h3>Daftar Pengajuan Surat Kelurahan</h3>
        <table class="table table-striped table-bordered mt-3">
            <thead>
                <tr>
                    <th>No Surat</th>
                    <th>Jenis Surat</th>
                    <th>Nama Pemohon</th>
                    <th>NIK Pemohon</th>
                    <th>Tanggal Ajuan</th>
                </tr>
            </thead>
                <tbody>
                    @foreach($semuaSurat as $s)
                    <tr>
                    <td>{{ $s->nomor_surat }}</td>
                    <td>{{ $s->jenis_surat }}</td>
                    <td>{{ $s->penduduk->nama }}</td>
                    <td>{{ $s->penduduk->nik }}</td>
                    <td>{{ $s->tanggal_ajuan }}</td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
</body>
</html>