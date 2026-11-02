@extends('layouts.app')

@section('title', 'Detail Laporan')

@section('content')
<div class="card shadow-sm border-0 col-md-8 mx-auto">
    <div class="card-header bg-white pt-3">
        <h4 class="fw-bold">Detail Laporan Banjir</h4>
    </div>
    <div class="card-body">
        <div class="text-center mb-4">
            <img src="{{ asset('storage/' . $laporan->foto) }}" alt="Foto Banjir" class="img-fluid rounded" style="max-height: 350px;">
        </div>
        <table class="table">
            <tr><th>Nama Pelapor</th><td>{{ $laporan->nama_pelapor }}</td></tr>
            <tr><th>No. HP</th><td>{{ $laporan->no_hp }}</td></tr>
            <tr><th>Lokasi</th><td>{{ $laporan->lokasi }}</td></tr>
            <tr><th>Kecamatan</th><td>{{ $laporan->kecamatan }}</td></tr>
            <tr><th>Tinggi Air</th><td>{{ $laporan->tinggi_air }} cm</td></tr>
            <tr><th>Keterangan</th><td>{{ $laporan->keterangan }}</td></tr>
            <tr><th>Status Penanganan</th><td><strong>{{ $laporan->status }}</strong></td></tr>
            <tr><th>Waktu Lapor</th><td>{{ $laporan->created_at->format('d M Y H:i') }}</td></tr>
        </table>
        <a href="{{ route('laporan.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection
