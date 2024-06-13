<!-- resources/views/transaksi/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Buat Transaksi Baru</h1>
        <form action="{{ route('transaksi.store') }}" method="POST">
            @csrf
            <div id="produk-list">
                <div class="produk-item mb-3">
                    <label for="produk_id" class="form-label">Produk</label>
                    <select name="produk_id[]" class="form-select" required>
                        @foreach ($produks as $produk)
                            <option value="{{ $produk->id }}">{{ $produk->nama }} - {{ $produk->harga }}</option>
                        @endforeach
                    </select>
                    <label for="jumlah" class="form-label">Jumlah</label>
                    <input type="number" name="jumlah[]" class="form-control" required>
                </div>
            </div>
            <button type="button" class="btn btn-secondary" id="add-produk">Tambah Produk</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

    <script>
        document.getElementById('add-produk').addEventListener('click', function () {
            var produkList = document.getElementById('produk-list');
            var produkItem = produkList.querySelector('.produk-item').cloneNode(true);
            produkItem.querySelectorAll('input').forEach(input => input.value = '');
            produkList.appendChild(produkItem);
        });
    </script>
@endsection
