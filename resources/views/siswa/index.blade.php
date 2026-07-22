<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
</head>
<body>
    <h2>Data Siswa</h2>
    <a href="{{ route('siswa.create') }}">Tambah Siswa</a>
    <br>

    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Absen</th>
        </tr>
        @foreach ($siswa as $sws)
            <td>{{ $loop->iteration }}</td>
            <td>{{ $sws->nama }}</td>
            <td>{{ $sws->kelas }}</td>

            <a href="{{ route('siswa.edit', $sws->$id) }}">Edit</a>

            <form action="{{ route('siswa.destroy', $sws->$id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm ('Yakin ingin menghapus?')">Hapus</button>
            </form>
        @endforeach
    </table>
</body>
</html>