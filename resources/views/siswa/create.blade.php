<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Siswa</title>
    
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

        /* Container Form */
        .form-container {
            background-color: #18181b; 
            border: 1px solid #3f3f46;
            border-radius: 8px;
            padding: 30px;
        }

        /* Styling Label & Input */
        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            color: #a1a1aa; /* Zinc-400 */
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

        /* Styling Tombol */
        .button-group {
            display: flex;
            gap: 12px;
            margin-top: 30px;
        }

        .btn-simpan {
            background-color: #a78bfa; /* Soft Violet */
            color: #09090b;
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
            flex: 1; 
        }

        .btn-simpan:hover {
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
    </style>
</head>
<body>

    <div class="form-wrapper">
        <h2>Tambah Data Siswa</h2>
        
        <div class="form-container">
            <form action="{{ route('siswa.store') }}" method="POST">
                @csrf 
                
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" required placeholder="Masukkan nama siswa...">
                </div>
                
                <div class="form-group">
                    <label>Kelas</label>
                    <input type="text" name="kelas" required placeholder="Contoh: 11 RPL 1">
                </div>
                
                <div class="button-group">
                    <button type="submit" class="btn-simpan">Simpan Data</button>
                    <a href="{{ route('siswa.index') }}" class="btn-batal">Batal</a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>