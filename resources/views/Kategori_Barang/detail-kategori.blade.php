<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Barang</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
    <div class="container">
        <div class="col-lg-10 mx-auto">
            <div class="card mt-5">
                <div class="card-header text-center">
                    <h2>Detail Barang</h2>
                </div>
                <div class="card-body">
                    
                    <table class="table">
                        @if ($dataBarang)
                          <tr>
                            <th style="border:0">jenis</th>
                            <td style="border:0">:</td>
                            <td style="border:0">{{ $dataBarang['jenis'] }}</td>
                          </tr>
                          <tr>
                            <th style="border:0">Type</th>
                            <td style="border:0">:</td>
                            <td style="border:0">{{ $dataBarang['type'] }}</td>
                          </tr>
                          <tr>
                            <th style="border:0">Jumlah</th>
                            <td style="border:0">:</td>
                            <td style="border:0">{{ $dataBarang['jumlah'] }}</td>
                          </tr>
                        @else
                            <td colspan="4">Tidak dapat menampilkan detail data</td>
                        @endif
                      </table>

                </div>
            </div>
        </div>
    </div>
</body>
</html>