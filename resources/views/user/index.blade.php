<x-guest-layout>

    <div class="container">
        
        
        <form action="" method="GET">
            <div class="form-group">
                <label for="search">Cari NIK</label>
                <input type="text" class="form-control" id="search" name="search">
              </div>
              <input type="submit" class="btn btn-primary" value="Cari">
        </form>
        @if (count($input_aspirasi) >= 1)
            <div class="container bg-white mt-3">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Lokasi</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Tanggal pengiriman</th>
                        <th scope="col">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        @foreach ($input_aspirasi as $in)
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$in->ket_kategori}}</td>
                            <td>{{$in->lokasi}}</td>
                            <td>{{$in->keterangan}}</td>
                            <td>{{$in->tanggal_input}}</td>
                            <td><a href="{{url("/aspirasi/view/$in->id_pelaporan")}}" class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                </svg>
                                </a>
                            </td>
                        @endforeach
                    </tr>
                    </tbody>
                </table>
            </div>
        @endif
        

    </div>

</x-guest-layout>
