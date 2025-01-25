<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Siswa</title>
</head>
<body>
    <div class="container-fluid">
        <div class="container mt-5">
            <!-- Display success message -->
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            <!-- Display error messages -->
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <a href="/siswa/create"><button type="button" class="btn btn-primary">Tambah</button></a>
            <table class="table">
                <thead>
                    <th>No</th>
                    <th>Nama Depan</th>
                    <th>Nama Belakang</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Alamat</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th colspan="2">Aksi</th>
                </thead>
                <tbody>
                    <!-- start loop -->
                    @foreach ($siswa as $i )
                        <tr>
                            <td>{{$loop->iteration }}</td>
                            <td>{{$i->nama_depan}}</td>
                            <td>{{$i->nama_belakang}}</td>
                            <td>{{$i->jenis_kelamin}}</td>
                            <td>{{$i->agama}}</td>
                            <td>{{$i->alamat}}</td>
                            <td>{{$i->created_at}}</td>
                            <td>{{$i->updated_at}}</td>
                            <td>
                                <a href="{{ route('siswa.edit', $i->id) }}" class="btn btn-warning">Edit</a>
                            </td>

                            <td>
                                <form action="{{ route('siswa.delete', $i->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure you want to delete this record?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    <!-- end loop -->
                </tbody>
            </table>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
