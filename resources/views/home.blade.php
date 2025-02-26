<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Keuangan</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <header class="header">
            <h1>Manajemen Keuangan</h1>
        </header>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('transaksi.store') }}" method="POST" class="transaction-form">
            @csrf
            <div class="form-group">
                <select name="jenis" class="form-control" required>
                    <option value="">Pilih Jenis</option>
                    <option value="pemasukan">Pemasukan</option>
                    <option value="pengeluaran">Pengeluaran</option>
                </select>
            </div>
            <div class="form-group">
                <input type="text" name="kategori" class="form-control" placeholder="Kategori" required>
            </div>
            <div class="form-group">
                <input type="text" name="deskripsi" class="form-control" placeholder="Deskripsi (opsional)">
            </div>
            <div class="form-group">
                <input type="number" name="jumlah" class="form-control" placeholder="Jumlah" required>
            </div>
            <div class="form-group">
                <input type="date" name="tanggal" class="form-control" required>
            </div>
            <button type="submit" class="btn">Tambah</button>
        </form>

        <h2>Transaksi Terakhir</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Kategori</th>
                    <th>Deskripsi</th>
                    <th>Jumlah</th>
                    <th>Jenis</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi as $tran)
                    <tr>
                        <td>{{ $tran->tanggal->format('d/m/Y') }}</td>
                        <td>{{ $tran->kategori }}</td>
                        <td>{{ $tran->deskripsi }}</td>
                        <td>Rp {{ number_format($tran->jumlah, 0, ',', '.') }}</td>
                        <td>{{ ucfirst($tran->jenis) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>