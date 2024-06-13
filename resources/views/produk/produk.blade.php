<x-app-layout>

    <div class="container">
        <h1>Daftar Produk</h1>
        {{-- <a href="{{ route('create') }}" class="btn btn-primary">Tambah Produk</a> --}}
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produks as $produk)
                    <tr>
                        <td>{{ $produk->id }}</td>
                        <td>{{ $produk->nama }}</td>
                        <td>{{ $produk->harga }}</td>
                        <td>{{ $produk->stok }}</td>
                        <td>
                            <a href="edit"  class="btn btn-warning">Edit</a>
                            {{-- <form action="{{ route('produk.destroy', $produk->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
