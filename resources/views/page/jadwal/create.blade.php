@extends('template')
@section('content')
{{-- <style>
    /* Tambahkan shadow dan border radius untuk card */
    .card {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    /* Header card */
    .card-header {
        background-color: #007bff;
        color: black;
        text-align: center;
        padding: 1rem;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
    }

    /* Gaya untuk elemen form */
    .form-control, select {
        border-radius: 5px;
        padding: 0.6rem;
        border: 1px solid #ced4da;
        font-size: 1rem;
        width: 100%;
        margin-top: 5px;
    }

    /* Styling label dan margin */
    label.form-label {
        font-weight: bold;
        margin-top: 10px;
        margin-bottom: 5px;
    }

    /* Tombol simpan dan kembali */
    .btn-primary, .btn-danger {
        font-weight: bold;
        padding: 0.5rem 1rem;
        border-radius: 5px;
        display: inline-flex;
        align-items: center;
    }

    .btn-primary i, .btn-danger i {
        margin-right: 5px;
    }

    /* Margin */
    .d-flex {
        gap: 1rem;
    }

    .mb-3 {
        margin-bottom: 1rem;
    }
</style> --}}

<br><br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0">Tambah Jadwal Latihan</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('jadwal.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="pelatih_id" class="form-label">Nama Pelatih</label>
                            <select name="pelatih_id" id="pelatih_id" class="form-control">
                                @foreach ($pelatih as $isi)
                                <option value="{{ $isi->id }}">{{ $isi->pelatih }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="jenis_id" class="form-label">Jenis Olahraga</label>
                            <select name="jenis_id" id="jenis_id" class="form-control">
                                @foreach ($jenis as $isi)
                                <option value="{{ $isi->id }}">{{ $isi->jenis }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" id="tanggal" name="tanggal" class="form-control" value="{{ old('tanggal', now()->toDateString()) }}" required>
                        </div>

                        <div class="d-flex">
                            <button type="submit" class="btn btn-primary me-2">
                                <i class="fas fa-save"></i> Simpan
                            </button>
                            <a href="{{ route('jadwal.index') }}" class="btn btn-danger">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const tanggalInput = document.getElementById('tanggal');

        // Jika value kosong, set nilai menjadi hari ini
        if (!tanggalInput.value) {
            const today = new Date().toISOString().split("T")[0];
            tanggalInput.value = today;
        }
    });
</script>
@endsection
