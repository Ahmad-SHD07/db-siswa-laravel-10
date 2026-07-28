<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Siswa</title>
    
    <style>
        * { box-sizing: border-box; }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #09090b; 
            color: #fafafa; 
            margin: 0;
            padding: 40px;
            display: flex;
            justify-content: center;
        }

        .form-wrapper {
            width: 100%;
            max-width: 500px; 
        }

        h2 {
            color: #fafafa;
            border-bottom: 1px solid #3f3f46; 
            padding-bottom: 15px;
            margin-bottom: 25px;
        }

        .form-container {
            background-color: #18181b; 
            border: 1px solid #3f3f46; 
            border-radius: 8px;
            padding: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            color: #a1a1aa; 
            font-size: 14px;
            margin-bottom: 8px;
            font-weight: 500;
        }

        input[type="text"] {
            width: 100%;
            padding: 12px 15px;
            background-color: #09090b; 
            border: 1px solid #3f3f46; 
            border-radius: 6px;
            color: #fafafa;
            font-size: 15px;
            transition: all 0.3s;
        }

        input[type="text"]:focus {
            outline: none;
            border-color: #a78bfa; 
            box-shadow: 0 0 0 2px rgba(167, 139, 250, 0.2); 
        }

        .button-group {
            display: flex;
            gap: 12px;
            margin-top: 30px;
        }

        .btn-update {
            background-color: #a78bfa; 
            color: #09090b;
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
            flex: 1;
        }

        .btn-update:hover {
            background-color: #9061f9;
        }

        .btn-batal {
            background-color: transparent;
            color: #fafafa;
            border: 1px solid #3f3f46; 
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: 600;
            text-decoration: none;
            text-align: center;
            transition: 0.3s;
            flex: 1;
        }

        .btn-batal:hover {
            background-color: #27272a; 
        }

        .text-error{
            color: #f87171;
            font-size: 13px;
            margin-top: 6px;
            display: block;
            font-weight: 500;
        }
    </style>
</head>
<body>

    <div class="form-wrapper">
        <h2>Edit Data Siswa</h2>
        
        <div class="form-container">
            <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <!-- Menampilkan nama lama dari database di dalam atribut value -->
                    <input type="text" name="nama" value="{{ old('nama', $siswa->nama) }}" required>
                    @error('nama')
                        <span class="text-error">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label>Kelas</label>
                    <!-- Menampilkan kelas lama dari database di dalam atribut value -->
                    <input type="text" name="kelas" value="{{ old('kelas', $siswa->kelas) }}" required>
                    @error('nama')
                        <span class="text-error">{{ $message }}</span>
                    @enderror

                </div>
                
                <div class="button-group">
                    <button type="submit" class="btn-update">Update Data</button>
                    <a href="{{ route('siswa.index') }}" class="btn-batal">Batal</a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>