<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Daftar Kota</h1>
        <a href="{{ route('kota.create') }}"><button type="button" class="btn btn-success mb-4">Tambah</button></a>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Kota</th>
                    <th>Provinsi</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kota as $i)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $i->nama_kota }}</td>
                        <td>{{ $i->provinsi }}</td>
                        <td>{{ $i->created_at }}</td>
                        <td>{{ $i->updated_at }}</td>
                        <td>
                            <a href="{{ route('kota.edit', $i->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('kota.destroy', $i->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
