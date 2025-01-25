<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Ortu</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Daftar Ortu</h1>
        <a href="/ortu/create"><button type="button" class="btn btn-success mb-4">Tambah</button></a>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Nama Ortu</th>
                    <th>Kota</th>
                    <th>Provinsi</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th colspan="2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                {{-- start loop --}}
                @foreach($ortu as $i)
                    <tr>
                        <td>{{ $i->nama_ortu }}</td>
                        <td>{{ $i->kota->nama_kota }}</td>
                        <td>{{ $i->kota->provinsi }}</td>
                        <td>{{ $i->created_at }}</td>
                        <td>{{ $i->updated_at }}</td>
                        <td>
                            <a href="{{ route('ortu.edit', $i->id) }}" class="btn btn-warning btn-sm">Edit</a>
                
                            <form action="{{ route('ortu.destroy', $i->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                {{-- end loop --}}
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
