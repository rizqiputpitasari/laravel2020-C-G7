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


            <h1 class="display-6">Kategori Barang</h1>
            <hr class="my-2">     

            <a href="{{ route('kategori.create') }}" class="btn btn-primary mb-1 my-3">Tambah Kategori</a>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Kategori</th>
                        <th scope="col" width="20%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @forelse($dataKategori as $brg)
                    <tr>
                        <td>{{ $no++ }} </td>
                        <td>{{ $brg['nama_kategori'] }}</td>
                        <td>
                            <form action="{{ route('kategori.destroy',$brg['id']) }}" method="POST">
                            <a href="{{ route('kategori.show',$brg['id']) }}" class="badge badge-primary">Detail</a>
                            <a href="{{ route('kategori.edit',$brg['id']) }}" class="badge badge-primary">Edit</a>
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
            window.location = "{{ url('kategori') }}/"+jenis;
        }
    </script>
@endsection