@extends('main')

@section('title', 'Laravel - Data Penjualan Toko')

@section('content')
    <div class="container">
        <div class="jumbotron">

            @php
                $jenis = ['samsung', 'xiaomi', 'Oppo', 'iphone', 'Nokia', "SEMUA"];
            @endphp
                    
                

                @if ($msg = Session::get('msg'))
                    <div class="alert alert-success">
                        <span>{{ $msg }}</span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>   
                    </div>
                @endif


            <h1 class="display-6">Data Barang</h1>
            <hr class="my-2">     

            <a href="{{ route('barang.create') }}" class="btn btn-primary mb-1 my-3">Tambah Barang</a>

            <form action="{{route('barang.index')}}" class="row mb-4">
                    <div class="col-md-8">
                        <select name="jenis" class="form-control">
                            <option value="" disabled selected>Pilih Jenis Hp</option>
                            @foreach ($jenis as $jns)
                            <option value="{{ $jns == "SEMUA" ? "" : $jns }}" >{{ $jns }} </option>
                            @endforeach 
                        </select>
                    </div>
                    <input type="submit" class="btn btn-success float-right mb-4" value="Cari">

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                
                    <th scope="col">ID</th>
                    <th scope="col">Jenis Barang</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Type Barang</th>
                    <th scope="col">Jumlah Barang</th>
                    <th scope="col">Action</th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @forelse($dataBarang as $brg)
                    @php $kategori = App\Barang::find($brg['id'])->barangkategori; @endphp
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $brg['jenis'] }}</td>
                        <td>{{ $kategori->nama_kategori }} </td>
                        <td>{{ $brg['type'] }}</td>
                        <td>{{ $brg['jumlah'] }}</td>
                        <td>
                            <form action="{{ route('barang.destroy',$brg['id']) }}" method="POST">
                            <a href="{{ route('barang.show',$brg['id']) }}" class="badge badge-primary">Detail</a>
                            <a href="{{ route('barang.edit',$brg['id']) }}" class="badge badge-primary">Edit</a>
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="badge badge-danger" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                        <td colspan="3"> Tidak ada Data</td>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function action(){  
            var jenis = document.getElementById('jenis').value;
            window.location = "{{ url('barang') }}/"+jenis;
        }
    </script>
@endsection