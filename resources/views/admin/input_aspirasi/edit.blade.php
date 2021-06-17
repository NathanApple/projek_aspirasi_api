<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Dashboard') }}
        </h2>
    </x-slot>
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

    <div class="container bg-white py-3 my-3 rounded">
        <form action="" method="POST">
            @csrf
            <div class="form-group row">
                <div class="col-sm-3">
                    <select class="form-control" name="status">
                        <option selected>Status</option>
                        <option value="menunggu">Menunggu</option>
                        <option value="proses">Proses</option>
                        <option value="selesai">Selesai</option>
                    </select>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="feedback" name="feedback" placeholder="feedback">
                </div>
            </div>
            <input type="submit" class="btn btn-primary" value="Kirim Feedback">
        </form>
    </div>


    <div class="container bg-white py-2 rounded">
        <div class="row m-2 py-2 px-2">
            <div class="col-3 border-right">
                Status
            </div>
            <div class="col-7 border-right">
                Feedback
            </div>
            <div class="col-2">
                Aksi
            </div>
        </div>
        @foreach ($aspirasi as $as)
            <div class="row border m-2 py-2 px-2">
                <div class="col-3 border-right">
                    {{$as->status}}
                </div>
                <div class="col-7">
                    {{$as->feedback}}
                </div>
                <div class="col-2">
                    <a href="{{url("/dashboard/aspirasi/delete/$as->id_aspirasi")}}" class="btn btn-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                        </svg>
                    </a>
                </div>

            </div>
        @endforeach
    </div>
</x-app-layout>