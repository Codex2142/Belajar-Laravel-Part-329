<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Edit</title>
</head>
<body>
    <div class="container-fluid mt-5">
        <div class="container">

            <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama_depan" class="form-label">Nama Depan:</label>
                    <input type="text"  class="form-control" name="nama_depan" id="nama_depan" value="{{ old('nama_depan', $siswa->nama_depan) }}" required>
                    @error('nama_depan')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
            
                <div>
                    <label for="nama_belakang" class="form-label">Nama Belakang:</label>
                    <input type="text" name="nama_belakang"  class="form-control" id="nama_belakang" value="{{ old('nama_belakang', $siswa->nama_belakang) }}" required>
                    @error('nama_belakang')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
            
                <div>
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin:</label>
                    <select name="jenis_kelamin" class="form-control" id="jenis_kelamin" required>
                        <option value="L" {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-Laki</option>
                        <option value="P" {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
            
                <div>
                    <label for="agama" class="form-label">Agama:</label>
                    <input type="text" name="agama" id="agama" class="form-control" value="{{ old('agama', $siswa->agama) }}" required>
                    @error('agama')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
            
                <div>
                    <label for="alamat" class="form-label">Alamat:</label>
                    <textarea name="alamat" id="alamat" class="form-control"  required>{{ old('alamat', $siswa->alamat) }}</textarea>
                    @error('alamat')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
            
                <button type="submit" class="btn btn-success mt-5">Update</button>
            </form>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>