@extends('template')
@section('content')
<br><br><br>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2 class="mb-0">Data Jadwal Latihan</h2>
        </div>
        <div class="card-body">
            <!-- Tombol tambah data -->
            <a href="{{ route('jadwal.create') }}" class="btn btn-primary mb-3">
                <i class="fa fa-plus"></i> Tambah Data
            </a>
            <!-- Input pencarian -->
            <input type="text" id="searchInput" class="form-control mb-3" placeholder="Cari jadwal..." onkeyup="searchTable()">
            <!-- Table -->
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pelatih</th>
                            <th>Jenis Olahraga</th>
                            <th>Tanggal</th>
                            <th colspan="2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1 @endphp
                        @foreach ($jadwal as $isi )
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$isi->pelatih ? $isi->pelatih->pelatih : 'Data tidak tersedia'}}</td>
                            <td>{{$isi->jenis->jenis}}</td>
                            <td>{{$isi->tanggal}}</td>
                            <td>
                                <a href="{{ route('jadwal.edit', $isi->id) }}"><i class="fas fa-edit"></i></a> <!-- Edit -->
                                <form action="{{ route('jadwal.destroy', $isi->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="background: none; border: none; color: red; cursor: pointer;">
                                    <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript untuk pencarian tabel -->
<script>
    function searchTable() {
        // Ambil input pencarian
        var input = document.getElementById('searchInput');
        var filter = input.value.toLowerCase();
        var table = document.getElementById('dataTables-example');
        var tr = table.getElementsByTagName('tr');

        // Looping melalui semua baris tabel, dan sembunyikan yang tidak sesuai pencarian
        for (var i = 1; i < tr.length; i++) {
            var tdList = tr[i].getElementsByTagName('td');
            var match = false;

            // Cek setiap kolom dalam baris
            for (var j = 0; j < tdList.length; j++) {
                if (tdList[j]) {
                    if (tdList[j].innerHTML.toLowerCase().indexOf(filter) > -1) {
                        match = true;
                        break;
                    }
                }
            }

            // Tampilkan atau sembunyikan baris berdasarkan hasil pencarian
            tr[i].style.display = match ? '' : 'none';
        }
    }
</script>
@endsection
