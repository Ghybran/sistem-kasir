<x-app-layout>
    <div class="container">
        <h1>Daftar Transaksi</h1>
        <a href="create" class="btn btn-primary">Buat Transaksi Baru</a>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tanggal</th>
                    <th>Total Harga</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksis as $transaksi)
                    <tr>
                        <td>{{ $transaksi->id }}</td>
                        <td>{{ $transaksi->tanggal }}</td>
                        <td>{{ $transaksi->total_harga }}</td>
                        <td>
                            <a href="{{ route('transaksi.show', $transaksi->id) }}" class="btn btn-info">Lihat Detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
