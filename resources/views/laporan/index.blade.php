@extends('layouts.app')

@section('title', 'Kelola Laporan Banjir')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="fw-bold">Daftar Laporan Banjir</h3>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card shadow-sm border-0">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Pelapor</th>
                        <th>Kecamatan / Lokasi</th>
                        <th>Tinggi Air</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($laporans as $index => $item)
                        <tr>
                            <td>{{ $laporans->firstItem() + $index }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $item->foto) }}" alt="Foto" width="80" class="rounded">
                            </td>
                            <td>
                                <strong>{{ $item->nama_pelapor }}</strong><br>
                                <small class="text-muted">{{ $item->no_hp }}</small>
                            </td>
                            <td>{{ $item->kecamatan }} - {{ $item->lokasi }}</td>
                            <td>{{ $item->tinggi_air }} cm</td>
                            <td>
                                <span class="badge 
                                    {{ $item->status == 'Menunggu' ? 'bg-warning text-dark' : ($item->status == 'Diproses' ? 'bg-info text-dark' : 'bg-success') }}">
                                    {{ $item->status }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('laporan.show', $item->id) }}" class="btn btn-sm btn-secondary">Detail</a>
                                <a href="{{ route('laporan.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('laporan.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus laporan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Belum ada data laporan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $laporans->links() }}
        </div>
    </div>
</div>
@endsection

