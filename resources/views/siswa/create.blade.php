<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Siswa</title>
</head>
<body>
    <h2>Tambah Siswa</h2>

    <form action="{{ route('siswa.store') }}" method="POST">
        @csrf <!-- Untuk keamanan form di laravel  -->

        <label>Nama:</label><br>
        <input type="text" name="nama" required><br><br>

        <label>Kelas:</label>
        <input type="text" name="kelas" required><br><br>

        <button type="submit">Simpan</button>
        <a href="{{ route('siswa.index') }}">Batal</a>

    </form>
</body>
</html>