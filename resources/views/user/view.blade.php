<x-guest-layout>
    <div class="container bg-white py-2 rounded my-2">
        <div class="row">
            <div class="col-sm">
                NIK :
            </div>
            <div class="col-sm">
                {{$input_aspirasi->nik}}
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm">
                Kategori :
            </div>
            <div class="col-sm">
                {{$input_aspirasi->kategori->ket_kategori}}
            </div>
        </div>

        <div class="row">
            <div class="col-sm">
                Lokasi :
            </div>
            <div class="col-sm">
                {{$input_aspirasi->lokasi}}
            </div>
        </div>

        <div class="row">
            <div class="col-sm">
                keterangan :
            </div>
            <div class="col-sm">
                {{$input_aspirasi->keterangan}}
            </div>
        </div>
    </div>

    <div class="container bg-white py-2 my-3 rounded">
        <form action="" method="POST">
            @csrf
            <div class="form-group">
                <label for="feedback">Input Feedback</label>
                <input type="text" class="form-control" id="feedback" name="feedback">
            </div>
            <input type="submit" class="btn btn-primary" value="kirim">
        </form>
    </div>


    <div class="container bg-white py-2 rounded">
        <div class="row m-2 py-2 px-2">
            <div class="col-3 border-right">
                Status
            </div>
            <div class="col-9">
                Feedback
            </div>
        </div>
        @foreach ($aspirasi as $as)
            <div class="row border m-2 py-2 px-2">
                <div class="col-3 border-right">
                    {{$as->status}}
                </div>
                <div class="col-9">
                    {{$as->feedback}}
                </div>
            </div>
        @endforeach
    </div>
</x-guest-layout>