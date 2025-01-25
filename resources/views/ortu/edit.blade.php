<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Ortu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Ortu</h1>

        <form action="{{ route('ortu.update', $ortu->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama_ortu" class="form-label">Nama Ortu</label>
                <input type="text" class="form-control" id="nama_ortu" name="nama_ortu" value="{{ $ortu->nama_ortu }}" required>
            </div>

            <div class="mb-3">
                <label for="kota_id" class="form-label">Kota</label>
                <select class="form-select" id="kota_id" name="kota_id" required>
                    @foreach($kota as $kota)
                        <option value="{{ $kota->id }}" {{ $ortu->kota_id == $kota->id ? 'selected' : '' }}>{{ $kota->nama_kota }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
