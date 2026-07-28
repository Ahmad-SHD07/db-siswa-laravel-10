<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #09090b; 
            color: #fafafa; 
            margin: 0;
            padding: 40px;
        }

        h2 {
            color: #fafafa;
            border-bottom: 1px solid #3f3f46; 
            padding-bottom: 15px;
            margin-bottom: 25px;
        }
        .btn-tambah {
            display: inline-block;
            background-color: #a78bfa; 
            color: #09090b; 
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 6px;
            margin-bottom: 25px;
            font-weight: 600;
            transition: 0.3s;
            border: none;
        }

        .btn-tambah:hover {
            background-color: #9061f9; 
        }

        .table-container {
            background-color: #18181b; 
            border: 1px solid #3f3f46; 
            border-radius: 8px;
            overflow: hidden; 
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 16px 20px;
            text-align: left;
            border-bottom: 1px solid #3f3f46; 
        }

        tr:last-child td {
            border-bottom: none;
        }

        th {
            background-color: #27272a;
            color: #a1a1aa; 
            font-weight: 600;
            text-transform: uppercase;
            font-size: 13px;
            letter-spacing: 0.5px;
        }

        tr:hover td {
            background-color: #27272a; 
        }

        .btn-edit, .btn-hapus {
            padding: 6px 14px;
            text-decoration: none;
            border-radius: 4px;
            font-weight: 600;
            font-size: 13px;
            cursor: pointer;
            transition: all 0.2s;
            background-color: transparent;
        }

        .btn-edit {
            color: #a78bfa; 
            border: 1px solid #a78bfa;
            margin-right: 8px;
        }

        .btn-edit:hover {
            background-color: #a78bfa;
            color: #09090b;
        }

        .btn-hapus {
            color: #f87171; 
            border: 1px solid #f87171;
        }

        .btn-hapus:hover {
            background-color: #f87171;
            color: #09090b;
        }

        .alert-success {
            background-color: rgba(16, 185, 129, 0.1); 
            color: #10b981;
            border: 1px solid #10b981;
            padding: 14px 20px;
            border-radius: 6px;
            margin-bottom: 25px;
            font-weight: 500;
            display: flex;
            align-items: center;
        }

        .select {
            width: 100%;
            padding: 12px 15px;
            background-color: #09090b;
            border: 1px solid #3f3f46;
            border-radius: 6px;
            color: #fafafa;
            font-size: 15px;
            transition: all 0.3s;
            appearance: none;
            cursor: pointer;
        }

        .select:focus {
            outline: none;
            border-color: #a78bfa;
            box-shadow: 0 0 0 2px rgba(167, 139, 250, 0.2);
        }
    </style>
</head>
<body>

    <h2>Data Siswa</h2>
    
    <a href="{{ route('siswa.create') }}" class="btn-tambah">Tambah Siswa</a>
    
    @if (session('success'))
        <div class="alert-success">
            ✅ {{ session('success') }}
        </div>
    @endif

    <div class="table-container">
        <table>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Aksi</th>
            </tr>
            
            @foreach ($siswa as $sws)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $sws->nama }}</td>
                <td>{{ $sws->kelas->nama_kelas }}</td>
                
                <td>
                    <a href="{{ route('siswa.edit', $sws->id) }}" class="btn-edit">Edit</a>
                    
                    <form action="{{ route('siswa.destroy', $sws->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-hapus" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

</body>
</html>