<!DOCTYPE html>
<html>
<head>
    <title>Edit Siswa</title>
</head>
<body>
    <h2>Edit Data Siswa</h2>
    
    <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Wajib untuk proses Update di Laravel -->
        
        <label>Nama:</label><br>
        <input type="text" name="nama" value="{{ $siswa->nama }}" required><br><br>
        
        <label>Kelas:</label><br>
        <input type="text" name="kelas" value="{{ $siswa->kelas }}" required><br><br>
        
        <button type="submit">Update</button>
        <a href="{{ route('siswa.index') }}">Batal</a>
    </form>
</body>
</html>