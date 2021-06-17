<x-guest-layout>

    <div class="container">
        
        <form action="" method="post">
            @csrf
            <div class="form-group">
                <label for="nik">NIK</label>
                <input type="text" class="form-control" id="nik" placeholder="nik" name="nik">
            </div>

            <div class="form-group">
                <label for="kategori">Kategori</label>
                <select class="form-control" id="kategori" name="kategori">
                    <option selected> Pilih Kategori</option>
                    @foreach ($kategori as $kt)
                        <option value="{{$kt->id_kategori}}">{{$kt->ket_kategori}}</option>
                    @endforeach
                  
                </select>
            </div>


            <div class="form-group">
                <label for="lokasi">lokasi</label>
                <input type="text" class="form-control" id="lokasi" placeholder="lokasi" name="lokasi">
            </div>

            <div class="form-group">
                <label for="keterangan">keterangan</label>
                <textarea class="form-control" id="keterangan" rows="3" name="keterangan"></textarea>
            </div>

            <input type="submit" value="Submit" class="btn btn-primary">

        </form>
    
    
    </div>


</x-guest-layout>